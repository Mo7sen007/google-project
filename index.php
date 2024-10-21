<?php
session_start();


include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    
    <ul  class="navbar">
        <li><img class="logo" src="pictures/logo.png" alt="Club Logo"></li>
        <li><a class="nav-link" href="#part2">Home</a></li>
        <li><a class="nav-link" href="quiz/Quizzes.php">Quizzes</a></li>
        <li><a class="nav-link" href="#members-section">Members</a></li>
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
        
    

            
        
    ?>
    
    </ul>
<div  id="part2" class="part2">
    <section class="hero-section">
    <div class="content">
        <h1>Welcome to the Google Club ISET'CH Website!</h1>
        <div>Join our club at ISET Charguia to <br>
        collaborate on tech projects and tackle<br>
        challenges together. Whether you're a<br>
        beginner or expert, you'll find resources<br>
        and a welcoming community to grow your skills!
        <br><br>
        </div>

        <div class="features">
            <div class="feature-item">
                <i class="icon">&#128101;</i>
                <span>COLLABORATION</span>
            </div>
            <div class="feature-item">
                <i class="icon">&#127942;</i> 
                <span>ACHIEVEMENTS</span>
            </div>
            <div class="feature-item">
                <i class="icon">&#127939;</i> 
                <span>FUN ACTIVITIES</span>
            </div>
        </div>
<br>
        <div class="cta-buttons">
            <a href="http://localhost/loginRegisterationSystem/login-register-main/registration.php" class="btn primary">Join Now</a>
            <a href="#" class="btn secondary">Learn More</a>
        </div>
    </div>
    
    <div class="background-image">
        <img src="pictures/Untitled design (1).png" alt="Background Image">
    </div>
</section>
</div>
<section class="achievements-section">
    <h2>Celebrating Our Achievements</h2>
    <p>Explore the milestones and successes of our club members.</p>
    <div class="achievement-cards">
        <div class="achievement-card">
            <img src="pictures/anual.png" alt="Annual Awards">
            <h3>Annual Awards</h3>
            <p>Achievements</p>
        </div>
        <div class="achievement-card">
            <video width="240" height="240" controls>
                <source src="video.mp4" type="video/mp4">
                <source src="video.mp4" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <h3>Team Projects</h3>
            <p>Collaboration</p>
        </div>
        <div class="achievement-card">
            <img src="pictures/animusday.jpg" alt="Club Events">
            <h3>Club Events</h3>
            <p>Community</p>
        </div>
        <div class="achievement-card">
            <img src="pictures/skillsharing.jpg" alt="Skill Sharing">
            <h3>Skill Sharing</h3>
            <p>Education</p>
        </div>
    </div>
</section>
<section id="members-section" class="members-section">
    <h2>Meet Our Inspiring Members</h2>
    <p>Our members bring diverse skills and passions to the club, driving our collective success.</p>
    <div class="member-cards">
        <div class="member-card">
            <img src="team/president.jpg" alt="President">
            <h3>Yassine H'riz</h3>
            <p>President</p>
        </div>
        <div class="member-card">
            <img src="team/Vice-President.png" alt="Vice President">
            <h3>Ryslen Neji</h3>
            <p>Vice President</p>
        </div>
        <div class="member-card">
            <img src="team/General-secretary.jpg" alt="General secretary">
            <h3>Nour Bouraoui</h3>
            <p>General secretary</p>
        </div>
        <div class="member-card">
            <img src="team/Human-Resources.jpg" alt="Human Resources">
            <h3>Lina Ezzar</h3>
            <p>Human Resources</p>
        </div>
        <div class="member-card">
            <img src="team/VP-Development.png" alt="VP Development">
            <h3>Youssef Laribi</h3>
            <p>VP Development</p>
        </div>
        <div class="member-card">
            <img src="team/VP Media.png" alt="VP Media">
            <h3>Aymen Magri</h3>
            <p>VP Media</p>
        </div>
    </div>
</section>


</body>
</html>