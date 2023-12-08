<?php
// Start a PHP session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Ortega-juuhl</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="style.css">
    <!-- Link to Font Awesome icons -->
    <script src="https://kit.fontawesome.com/9e81387435.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Home Section -->
    <div class="home">
        <!-- Navbar Section -->
        <div class="navbar">
            <!-- Icons for account dropdown -->
            <div id="navbar-icons"> 
                <div class="dropdown">
                    <!-- Account dropdown content -->
                    <div class="account">
                        <i class="fa-solid fa-user"></i>
                        <div class="dropdown-content">
                            <?php
                            // Check if user is logged in
                            if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
                                // User is logged in, show account-related options
                                echo '<a href="account.php"><i class="fa-solid fa-gear"></i> Settings</a>';
                                echo '<a href="your_messages.php"><i class="fa-solid fa-message"></i> Messages</a>';
                                echo '<a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>';
                            } else {
                                // User is not logged in, show login option
                                echo '<a href="login.html"><i class="fa-solid fa-sign-in-alt"></i> Login</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Links to different sections -->
            <div class="links">
                <div id="home" onclick="scrollToTop()">HOME</div>
                <div id="about" onclick="scrollToAbout()">ABOUT</div>
                <div id="projects" onclick="scrollToProjects()">PROJECTS</div>
                <div id="contact" onclick="scrollToContact()">CONTACT</div>
            </div>
        </div>

        <!-- Main Text Section -->
        <div class="main-text">
            <span id="text-hello">Hello,&nbsp</span>I'm an <span id="developer-text">&nbspIT developer</span>
        </div> 

        <!-- Under Text Section -->
        <div class="under-text">
            I'm a 16-year-old high school student studying informasjons teknologi. <br> I enjoy a wide spectrum of coding and IT development.
        </div>

        <!-- Button to Scroll to Projects -->
        <div class="projects-button"  onclick="scrollToProjects()">
            <span id="project-text" >PROJECTS</span>
        </div>   
    </div>

    <!-- About Section -->
    <div class="top-about-me">
        <!-- Title for About Me Section -->
        <div id="main-text-about">ABOUT ME</div>
        <div id="underline-about"></div>
        <!-- Description for About Me Section -->
        <div id="under-text-about">
            Here you will get to know me better, and my skills I have picked up to <br>now.
        </div>
    </div>

    <!-- Detailed About Me Section -->
    <div class="about">
        <div class="about-me">
            <!-- Title for More About Me -->
            <div id="about-me-title">More about me</div>
            <!-- Text Describing More About Me -->
            <div id="about-me-text">
                I'm Erik, and im a <span id="software-developer-text">software developer</span> <br>  I love creating computer programs <br> using PHP, MYSQL, HTML, CSS and JS.<br><br>
                I like building things that make my<br> daily life easier.  <br>
            </div>
        </div>
        
        <!-- Section for Displaying My Skills -->
        <div class="my-skills">
            <div id="my-skills-title">My skills</div>
            <!-- Displaying Different Skill Buttons -->
            <div class="my-skills-buttons">
                <div id="HTML">HTML</div>
                <div id="CSS">CSS</div>
                <div id="JS">JS</div>
            </div>
            <div class="my-skills-buttons">
                <div id="git">Git</div>
                <div id="terminal">MYSQL</div>
                <div id="python">PHP</div>
            </div>
        </div>
    </div>
    
    <!-- Projects Section -->
    <div class="projects-page">
        <!-- Title for Projects Section -->
        <div class="top-projects">
            <div id="main-text-projects">PROJECTS</div>
            <div id="underline-projects"></div>
            <!-- Description for Projects Section -->
            <div id="under-text-projects">This portifolio showcases a collection of projects I've completed during <br> my high school years</div>
        </div>
        <div id="under-text-projects">I have no current prosjects to showcase. Updating  soon.</div>
        <script src="index.js"></script>
    </div>

    <!-- Contact Section -->
    <div class="messaging-form">
        <!-- Title for Contact Section -->
        <div id="main-text-projects" class="space">CONTACT</div>
        <div id="underline-projects"></div>
        <!-- Form for Sending Messages -->
        <div>
            <form action="send_message.php" method="post" class="form-styling"> 
                <div id="contact-background">
                    <p id="message-contact">Message</p>
                    <label for="message"></label>
                    <br>
                    <input type="text" id="contact-message" name="message" required>
                    <input class="btn" id="send-btn-contact" type="submit" value="Send">
                    <br>
                </div>           
            </form>
        </div>
        <div class="space"></div>
    </div>
</body>
</html>
