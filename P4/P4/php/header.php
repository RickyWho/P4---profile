<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forum</title>
</head>
<body>
  <h2>&lt;CODE/bug&gt;</h2>
  <nav>
    <a class="item" href="forum.php">Home</a>
    <a class="item" href="create_topic.php">Create a topic</a>
    <a class="item" href="create_category.php">Create a category</a>
  </nav>

    <?php
      if(isset($_SESSION['logged_in'])) {
          echo 'Hello, ' . $_SESSION['user_name'] . ' | <a href="profile.php">Profile Page</a> <a href="logout.php">Sign Out</a>';
      }
      else { ?>
          <a href="homepage.php">Sign in</a> or
          <a href="homepage.php">create an account</a>.
      <?php } ?>
