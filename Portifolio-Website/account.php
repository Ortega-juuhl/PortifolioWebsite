<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/9e81387435.js" crossorigin="anonymous"></script>
    <title>Account</title>
</head>
<body>  
    

<div class="tab">
    <a href="index.php"><button><i class="fa-solid fa-house"></i> Home</button></a>
    <button class="tablinks" onclick="openTab(event, 'change_password')"><i class="fa-solid fa-lock"></i> Password</button>
    <button class="tablinks" onclick="openTab(event, 'change_email')"><i class="fa-solid fa-envelope"></i> Email</button>
    <button class="tablinks" onclick="openTab(event, 'change_username')"><i class="fa-solid fa-circle-user"></i> Username</button>
    <button class="tablinks" onclick="openTab(event, 'delete_account')"><i class="fa-solid fa-trash"></i> Delete</button>
    <button class="tablinks" onclick="openTab(event, 'faqs')"><i class="fa-solid fa-question"></i> FAQs</button>
    <button class="tablinks" onclick="openTab(event, 'logout')"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
</div>

<div id="change_password" class="tabcontent">
    <h2>Change Password</h2>
    <div class="form-styling">
        <form action="change_password.php" method="post">
            <input type="password" id="oldpassword" name="oldpassword" required placeholder="Old password..."><br><br>
            <input type="password" id="newpassword" name="newpassword" required placeholder="New password..."><br><br>
            <input type="submit" class="btn" value="Change">
        </form>
    </div>
</div>

<div id="change_email" class="tabcontent">
    <h2>Change Email</h2>
    <div class="form-styling">
        <form action="change_email.php" method="post">
            <input type="email" id="currentemail" name="currentemail" required placeholder="Old email..."><br><br>
            <input type="email" id="newemail" name="newemail" required placeholder="New email..."><br><br>
            <input class="btn" type="submit" value="Change">
        </form>
    </div>
</div>

<div id="change_username" class="tabcontent">
    <h2>Change Username</h2>
    <div class="form-styling">
        <form action="change_username.php" method="post">
            <input type="text" id="currentusername" name="currentusername" required placeholder="Old username..."><br><br>
            <input type="text" id="newusername" name="newusername" required placeholder="New username..."><br><br>
            <input class="btn" type="submit" value="Change">
        </form>
    </div>
</div>

<div id="delete_account" class="tabcontent">
    <h2>Delete Account Confirmation</h2>
    <p>Are you sure you want to delete your account?</p>
    <div class="form-styling">
        <form action="delete_account.php" method="post">
            <input class="btn" type="submit" name="confirm" value="Confirm">
        </form>
    </div>
</div>

<div id="logout" class="tabcontent">
    <h2>Logout</h2>
    <div class="form-styling">
        <form action="logout.php" method="post">
            <input class="btn" type="submit" value="Logout">
        </form>
    </div>
</div>

<div id="faqs" class="tabcontent">
    <h2>Frequently Asked Questions</h2>
    <ul class="faq-list">
        <li>
            <div class="faq-question" onclick="toggleFAQ('faq1')">How do I change my password?</div>
            <div id="faq1" class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</div>
        </li>
        <li>
            <div class="faq-question" onclick="toggleFAQ('faq2')">How do I change my username?</div>
            <div id="faq2" class="faq-answer">It is a long established fact that a reader will be...</div>
        </li>
        <li>
            <div class="faq-question" onclick="toggleFAQ('faq3')">How do I change my email</div>
            <div id="faq3" class="faq-answer">It is a long established fact that a reader will be...</div>
        </li>
        <li>
            <div class="faq-question" onclick="toggleFAQ('faq4')">How do I send a message?</div>
            <div id="faq4" class="faq-answer">It is a long established fact that a reader will be...</div>
        </li>
        <li>
            <div class="faq-question" onclick="toggleFAQ('faq5')">How do I delete my account?</div>
            <div id="faq5" class="faq-answer">It is a long established fact that a reader will be...</div>
        </li>

        <li>
            <div class="faq-question" onclick="toggleFAQ('faq5')">How do I delete my message?</div>
            <div id="faq5" class="faq-answer">It is a long established fact that a reader will be...</div>
        </li>
        <br>
        <br>
    </ul>
</div>

<script>
// Function to switch between tabs
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  // Get all elements with class "tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  // Remove the "active" class from all elements with class "tablinks"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }
  // Display the current tab and set it as active
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.classList.add("active");
}

// Function to toggle FAQ sections
function toggleFAQ(faqID) {
  var faq = document.getElementById(faqID);
  // Toggle the 'active' class of the selected FAQ section
  faq.classList.toggle('active');
}

// Make the FAQs tab active by default and set other tabs to display: none initially
document.getElementById('faqs').style.display = 'block'; // Display FAQs
document.querySelector('.tablinks.active').classList.remove('active'); // Remove active class from the initially active tab
document.querySelector('.tablinks:nth-child(5)').classList.add('active'); // Add active class to the fifth tab (index starts at 1)
</script>


</body>
</html>
