<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./node_modules/bulma/css/bulma.css">
    <title>Document</title>
</head>

<body>
        <?php
        session_start();
          if($_SESSION['User_id'] == "")
          {
              echo '<script language="javascript">';
                      echo 'alert("Please Login!")';
                      echo '</script>';
                      echo "<script>window.location='login.html'</script>";
              exit();
          }
              require 'connectdb.php';
              $q = "SELECT * FROM Users WHERE User_id = ".$_SESSION["User_id"]."";
              $result = mysqli_query($dbcon,$q);
      
      ?>
    <form name="form1" method="post" action="save_comment.php">
        <section class="hero is-dark is-small">
            <div class="hero-head">
                <nav class="navbar">
                    <div class="container">
                        <div class="navbar-brand">
                            <a class="navbar-item">
                                <img src="./images/Movies.png" alt="Logo">
                            </a>
                            <span class="navbar-burger burger" data-target="navbarMenuHeroB">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div id="navbarMenuHeroB" class="navbar-menu">
                            <div class="navbar-end">
                                <a class="navbar-item " href="./index.html">
                                    Home
                                </a>
                                <a class="navbar-item" href="./logout.php">
                                    Log out
                                </a>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="hero-body">
                <div class="container has-text-centered">
                    <p class="title">
                        <img src="./images/logo.png" alt="Logo">
                    </p>
                    <p class="subtitle">
                        Movie Review Website
                    </p>
                </div>
            </div>


        </section>
        <section class="hero is-success  has-background-light">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <div class="column is-8 is-offset-2">
                        <h3 class="title has-text-grey">Comment</h3>
                        <div class="box">

                            <div class="field">
                                <div class="control">
                                    <textarea class="textarea is-warning is-large" type="text" placeholder="Write your comment" name="commenttxt" id="commenttxt"></textarea>
                                </div>
                            </div>
                            <button class="button is-block is-dark is-medium is-fullwidth" type="submit" name="Submit"
                                    value="Comment">Click to Comment</button>
                            
                        </div>



                    </div>




                </div>
            </div>
        </section>
    </form>

</body>

</html>