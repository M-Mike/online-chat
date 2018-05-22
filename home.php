<?php /*Pour importer les données de la session, nom, etc.*/
session_start();
include 'config.php';

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>OnlineChat</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/main_page.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/contact-form.css">

    <!--Link to Font awesome, for font icons -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  </head>

  <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <!--Sided navbar-->
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="#">Home</a>
          <a href="#">Events</a>
          <a href="#">Messaging</a>
          <a href="#">FAQ</a>
          <a href="#">Terms of use</a>
          <a href="#">About us</a>
        </div>

        <!-- Use any element to open the sidenav -->
        <a></i><span class="sidebar-menu btn glyphicon glyphicon-th-list" onclick="openNav()"><i class="fas fa-caret-square-down fa-2x"></i></i></span></a>
<!--end Side Navbar-->

          <div class="container"><!--Pour garder l'alignement du chat-box et la partie droite du navbar aligné-->
            <a class="navbar-brand" href="https://duckduckgo.com/">TAKE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <a href="https://duckduckgo.com/"><!--Pour permettre le click dessus-->
              <div id="logo" class="navbar-brand">
                <ul class="logo-list">
                  <li><span data-hover="M">-</span></li>
                  <li><span data-hover="@">M</span></li>
                  <li><span data-hover="G">I</span></li>
                  <li><span data-hover="I">K</span></li>
                  <li><span data-hover="C">E</span></li>
                </ul>
              </div>
            </a>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
              <ul class="navbar-nav ml-auto">
                <!--
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              -->
<!--               <div class="pull-right navbar-text">
                <img src="http://placehold.it/30x30">
                Chuck Norris
              </div> -->
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="avatar/user.png"><?php echo htmlspecialchars($_SESSION['username']); /*Pour importer le nom qu'on a stocké en valeur de session dans login.php. session.php stocke les données*/?></a>
                  <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i></i> Profile </a>
                    <a class="dropdown-item" class="fas fa-sliders" href="#"><i class="fas fa-sliders-h"></i> Settings </a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                    </div>
                  </div>
                </li>
            </div>
          </div>
        </nav>



    <main role="main" class="container" col-md-2 d-none d-md-block bg-light sidebar>


      <div id="chatbox" class="output">
        
        <!--Codes pour récúpérer les messages de la table "posts" dans le database chatdatabase-->

        <?php
          $sql = "SELECT * FROM posts";
          $result = $link->query($sql);

          if($result->num_rows > 0){
            //output data of each row
            while($row = $result->fetch_assoc()){
              echo "" . $row["username"]. " " .":: " . $row["msg"]." -- " .$row["date"]. "<br>";
              echo "<br>";
            }
          }else{
            echo "0 results";
          }
          $link->close();
        ?>
        <!-- ************* -->
      </div>


      <div class="md-form amber-textarea active-amber-textarea-2">
          <i class="fas fa-pencil-alt prefix"></i>
          <form method="post" action="send.php">
            <button id="btn-chat" class="btn btn-info btn-sm" type="submit" name="send-message" value="Send" style="float: right; padding-top: 0.5em; padding-bottom: 0.5em;">
              <i class="far fa-share-square"></i>
            </button>
            <div style="overflow: hidden; padding-right: .5em;">
              <input type="text" name="msg" id="message-container" class="md-textarea form-control" rows="3" placeholder="Enter your message here..." style="width: 100%";></input>
            </div>
          </form>
      </div>


    </main><!-- /.container -->

<footer id="footer" class="page-footer font-small stylish-color-dark pt-1 mt-1">
    <!--Social buttons-->
    <div class="text-center">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a href="#contact" class="button email" data-toggle="modal"><span><i class="far fa-envelope"></i></span><p>Email us</p></a>
            </li>
            <li class="list-inline-item">
              <a href="#" class="button facebook"><span><i class="fab fa-facebook-f"></i></span><p>Facebook</p></a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="button google-plus"><span><i class="fab fa-google-plus-g"></i></span><p>Google +</p></a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="button linkedin"><span><i class="fab fa-linkedin"></i></span><p>Linkedin</p></a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="button instagram"><span><i class="fab fa-instagram"></i></span><p>instagram</p></a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="button copyright"><span><i class="far fa-copyright"></i></span><p>M@gic_Mike</p></a>
            </li>
        </ul>
    </div>
    <!--/.Social buttons-->
<!-- 
    <div class="footer-copyright py-3 text-center">
        © 2018 Copyright:
        <a href="https://mdbootstrap.com/material-design-for-bootstrap/"> MDBootstrap.com </a>
    </div>
  -->

</footer>
<!--/.Footer-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!--modal script for the contact form-->
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="form-horizontal" role="form">
          <div class="modal-header">
            <div class="contact-header">
              <h1 class="modal-title" id="myModalLabel">Contact us</h1>
              <p class="hint-text">We'd love to hear from you, please drop us a line if you have any query or question.</p>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          
          <div class="modal-body">

            <div class="form-group"><!--pour le nom-->
              <label for="contact-name" class="col-sm-6 control-label">How would we call you?</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="contact-name" placeholder="First & Last Name" required>
              </div>
            </div>
            <div class="form-group"><!--pour le courriel-->
              <label for="contact-email" class="col-sm-8 control-label">How would we keep in touch with you?</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" id="contact-email" placeholder="example@domain.com" required>
              </div>
            </div>
            <div class="form-group"><!--pour le message-->
              <label for="contact-message" class="col-sm-8 control-label">What would you like to know?</label>
              <div class="col-sm-12">
                <textarea class="form-control" rows="4" placeholder="Enter your messages here..." required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" href="#" class="btn btn-info">Send</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!---->




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

    <!--script for side navbar-->
    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "255px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
    <!--end script for side navbar-->
  </body>
</html>
