<?php
//Login credentials:
//username - admin
//password - adminpass

include 'db_connect.php';
include 'header.php';

echo '<h3>Sign in</h3>';

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{ ?>
    <span>You are already signed in, would you like to <a href="logout.php">sign out</a>?</span>
<?php
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    { ?>
        <form method="post" action="">
            Username: <input type="text" name="username" />
            Password: <input type="password" name="password">
            <input type="submit" value="Sign in" />
        </form>
    <?php
    }
    else
    {
        $errors = array();

        if(!isset($_POST['username']))
        {
            $errors[] = 'The username field must not be empty.';
        }

        if(!isset($_POST['password']))
        {
            $errors[] = 'The password field must not be empty.';
        }

        if(!empty($errors))
        { ?>
            <div>
                Incomplete fields
                <ul>
            <?php foreach($errors as $key => $value) { ?>
                    <li> <?php ' . $value . ' ?> </li>
            <?php } ?>
                </ul>
        <?php
        }
        else
        {
            $user = $_POST['username'];
            $pass_hash = sha1($_POST['password']);

            $sql = "SELECT
                        user_id,
                        username,
                        user_level
                    FROM
                        users
                    WHERE
                        username = '".$user."'
                    AND
                        password = '".$pass_hash."'";

            $result = mysqli_query($connection, $sql);
            if(!$result)
            {
                echo 'Something went wrong. Please try again later.';
                //echo mysqli_error($connection);
            }
            else
            {
                if(mysqli_num_rows($result) == 0)
                {
                    echo 'Incorrect username or password. Please try again.';
                }
                else
                {
                    $_SESSION['logged_in'] = true;

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['user_name']  = $row['username'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }

                    echo 'Welcome, ' . $_SESSION['user_name'];
                    header("location: forum.php");
                }
            }
        }
    }
}

include 'footer.php';
?>
