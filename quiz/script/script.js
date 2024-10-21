let score = 0;

function checkAnswer(button, isCorrect, questionID) {
    if (isCorrect) {
        button.classList.add('correct');
        score += 10;
    } else {
        button.classList.add('incorrect');
    }
    
    let buttons = button.parentElement.querySelectorAll('.option');
    buttons.forEach(btn => btn.disabled = true);
    fetch('../save_score.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ questionID: questionID, score: score }),
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
}