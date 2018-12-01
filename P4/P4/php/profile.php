<?php
include 'db_connect.php';
include 'header.php';
?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Profile Page</title>
        <link href="styles.css" rel="stylesheet" type="text/css">
   </head>
 <body>

   <div class="content">
 		  <header>

       </header>

       <div class="rightSection2">
         <div class="login-boxRight">
           <div class="rowRight">

                 <div class="column2 login-left">
                   <form action="" method="POST" enctype="multipart/form-data"
                     <button type="submit" name="submit" id="profileIMG"><img id="profilePic" src="../img/avatar.png"></button>

                 </div>
                   <h2><?php
                     if(isset($_SESSION['logged_in'])) {
                         echo 'Welcome back, ' . $_SESSION['user_name'] . ' ';
                     }
                    ?></h2>

                 <div class="column2 login-right">


                </div>

             </div>
           </div>
       </div>

       <div class="leftSection">
         <div class="login-boxLeft">
           <div class="rowLeft">

                 <div class="column2 login-left">
                     <h2>Upload your works here:</h2>
                     <button><img id="workPlacehold" src="../img/placehold.png"></button>
                 </div>

                 <div class="column2 login-right">



                </div>

             </div>
           </div>
       </div>

   </div>






 </body>
 </html>
