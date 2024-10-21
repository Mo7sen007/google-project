<?php
session_start();


include '../database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
    <link rel="stylesheet" href="../style2.css">
    <script src="script/script.js"></script>
</head>
<body class="body-quizz">
    <ul  class="navbar">
        <li><img class="logo" src="../pictures/logo.png" alt="Club Logo"></li>
        <li><a class="nav-link" href="../index.php">Home</a></li>
        <li><a class="nav-link" href="integration/Quizzes.html">Quizzes</a></li>
        <li><a class="nav-link" href="../index.php#members-section">Members</a></li>
        <?php
        if (isset($_SESSION["user"])) {
            $userID = $_SESSION["user"];
            $sql = "SELECT full_name FROM users WHERE email = ?";
            $username=$_SESSION["full_name"];
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("i", $userID);
                $stmt->execute();
                $stmt->bind_result($full_name);
                $stmt->fetch();
                $stmt->close();
            }
            
            echo '<li class="fullName">' . htmlspecialchars($username) . '</li>';
        }
        if (!isset($_SESSION["user"])) {
    
            echo '<li class="nav-button"><a href="http://localhost/loginRegisterationSystem/login-register-main/login.php" class="btn primary">Log In</a></li>';
        }else{
            echo'<li class="nav-button"><a href="http://localhost/loginRegisterationSystem/login-register-main/logout.php" class="btn primary">Log out</a></li>';
        }
        
        $sql = "SELECT SUM(score) AS total_score FROM quiz_scores WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $stmt->bind_result($total_score);
        $stmt->fetch();
        $stmt->close();

        $conn->close();


            
        
    ?>
    
    </ul>
    <div class="quiz-container">
        <h1>Club Quiz</h1>
        <div>
            <p>Your total score: <?php echo $total_score; ?></p>
        </div>
        <div class="question">
            <p>1. When was the club founded?</p>
            <button class="option" onclick="checkAnswer(this, true,1)">2014</button>
            <button class="option" onclick="checkAnswer(this, false,1)">2013</button>
            <button class="option" onclick="checkAnswer(this, false,1)">2008</button>
            <button class="option" onclick="checkAnswer(this, false,1)">2019</button>
        </div>
    
        <div class="question">
            <p>2. Who is the current president of the club?</p>
            <button class="option" onclick="checkAnswer(this, false,2)">Yassine Ghazala</button>
            <button class="option" onclick="checkAnswer(this, true,2)">Yassine H'riz </button>
            <button class="option" onclick="checkAnswer(this, false,2)">Meriem fraj</button>
            <button class="option" onclick="checkAnswer(this, false,2)">Ryslen Neji</button>
        </div>
        <div class="question">
            <p>3. How many members does the club currently have?
            </p>
            <button class="option" onclick="checkAnswer(this, false,3)">38</button>
            <button class="option" onclick="checkAnswer(this, false,3)">30 </button>
            <button class="option" onclick="checkAnswer(this, false,3)">24</button>
            <button class="option" onclick="checkAnswer(this, true,3)">39</button>
        </div>
        <div class="question">
            <p>4. What is the club's official motto?</p>
            <button class="option" onclick="checkAnswer(this, false,4)">Building a better future</button>
            <button class="option" onclick="checkAnswer(this, false,4)">Where Imagination Meets Creation </button>
            <button class="option" onclick="checkAnswer(this, false,4)">Creat the change</button>
            <button class="option" onclick="checkAnswer(this, true,4)">Why follow when you can Lead</button>
        </div>
        <div class="question">
            <p>5. Who can join the club?</p>
            <button class="option" onclick="checkAnswer(this, false,5)">Only students</button>
            <button class="option" onclick="checkAnswer(this, true,5)">Anyone with an interest</button>
            <button class="option" onclick="checkAnswer(this,false ,5)">Faculty members only</button>
            
        </div>
        <div class="question">
            <p>6. What kind of team-building activities does the club organize?</p>
            <button class="option" onclick="checkAnswer(this, true,6)">Workshops </button>
            <button class="option" onclick="checkAnswer(this, true,6)">Tech Seminars or Guest Speaker Events </button>
            <button class="option" onclick="checkAnswer(this, true,6)">Group Projects</button>
            <button class="option" onclick="checkAnswer(this, true,6)">Hackathons</button>
        </div>
        <div class="question">
            <p>7. What is the duration of a typical Workshop?</p>
            <button class="option" onclick="checkAnswer(this, false,7)">1 hour </button>
            <button class="option" onclick="checkAnswer(this, false,7)">2 hours </button>
            <button class="option" onclick="checkAnswer(this, false,7)">150 minutes</button>
            <button class="option" onclick="checkAnswer(this, true,7)">3 hours</button>
        </div>
        <div class="question">
            <p>8. What does "HTTP" stand for?</p>
            <button class="option" onclick="checkAnswer(this, true,8)">HyperText Transfer Protocol </button>
            <button class="option" onclick="checkAnswer(this, false,8)">Hyperlink Transfer Process </button>
            <button class="option" onclick="checkAnswer(this, false,8)">Hyperlink Text Protocol</button>
            <button class="option" onclick="checkAnswer(this, false,8)">Hyper Transfer Text Procedure</button>
        </div>
        <div class="question">
            <p>9. Which of these is a front-end web development language?</p>
            <button class="option" onclick="checkAnswer(this, false,9)">C++ </button>
            <button class="option" onclick="checkAnswer(this, false,9)">PHP </button>
            <button class="option" onclick="checkAnswer(this, true,9)">HTML</button>
            <button class="option" onclick="checkAnswer(this, false,9)">Java</button>
        </div>
        <div class="question">
            <p>10. What is the main purpose of a database?</p>
            <button class="option" onclick="checkAnswer(this, true,10)">To store data </button>
            <button class="option" onclick="checkAnswer(this, false,10)">To display websites </button>
            <button class="option" onclick="checkAnswer(this, false,10)"> To connect devices</button>
            <button class="option" onclick="checkAnswer(this, false,10)">To analyze code</button>
        </div>
        <div class="question">
            <p>11. What does the acronym HTML stand for?</p>
            <button class="option" onclick="checkAnswer(this, false,11)">HighText Machine Language </button>
            <button class="option" onclick="checkAnswer(this, true,11)">HyperText Markup Language </button>
            <button class="option" onclick="checkAnswer(this, false,11)">HyperTransfer Markup Language</button>
            <button class="option" onclick="checkAnswer(this, false,11)">Hyperlink and Text Markup Language</button>
        </div>

        <a href="#top" class="up-button">
            ↑ Go to Top
        </a>
    
    </div>
</body>
</html>