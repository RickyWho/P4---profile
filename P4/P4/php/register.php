<?php
include 'db_connect.php';


?><h3>Sign up</h3> <?php

if($_SERVER['REQUEST_METHOD'] != 'POST') { ?>
  <form action="" method="post">

          <label>Username:</label>
          <input type="text" name="username" class="form-control" ><br />

          <label>Password:</label>
          <input type="password" name="password" class="form-control" ><br />

          <label>University E-mail:</label>
          <input type="email" name="email" class="form-control" ><br />

          <input name="submit" id="submit" class="btn btn-primary" type="submit" value="Register" /><br />



     </form>
<?php }
else
{
    $errors = array();

    if(isset($_POST['username']))
    {
        if(!ctype_alnum($_POST['username']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['username']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The username field must not be empty.';
    }

    //removed user_pass_check
    if(!isset($_POST['password']))
    {
        $errors[] = 'The password field cannot be empty.';
    }

    if(!empty($errors))
    { ?>
        <p>Uh-oh.. a couple of fields are not filled in correctly..</p>
        <ul> <?php
        foreach($errors as $key => $value) { ?>
            <li>
                <?php  $value  ?>
            </li>
        <?php } ?>
        </ul>
    <?php }
    else
    {
        $user = $_POST['username'];
        $pass_hash = sha1($_POST['password']);
        $email = $_POST['email'];

        $sql = "INSERT INTO users (username, password, email)
                VALUES('$user','$pass_hash','$email')";

        $result = mysqli_query($connection, $sql);
        if(!$result)
        {

            echo "<script>alert('Invalid account registration. Try again.');
                    window.location.href='homepage.php';
                  </script>";
            //echo mysqli_error($connection);
        }
        else
        {
          echo "Account successfully created. Start posting! You will be redirected to the homepage in 5 seconds.";
          header("Refresh: 5; url=forum.php"); //Takes user to login page in 3 secs
        }
    }
}


?>
