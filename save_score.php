<?php
session_start();
include 'database.php';


$data = json_decode(file_get_contents("php://input"), true);
$questionID = $data['questionID'];
$score = $data['score'];
$userID = $_SESSION['user']; 
$sql = "INSERT INTO quiz_scores (user_id, question_id, score) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $userID, $questionID, $score);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}

$stmt->close();
$conn->close();
?>