<?php
include 'koneksi.php';
session_start();
if (isset($_POST['masuk'])) {
    $userName = htmlspecialchars($_POST['username']);
    $Sandi = htmlspecialchars($_POST['password']);
    $sql = "SELECT * FROM admin WHERE username ='$userName' and password='$Sandi'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id_'];
        if ($result) {
            header("Location: Admin/index.php");
        }
    }
    $sql1 = "SELECT * FROM traines WHERE username ='$userName' and password='$Sandi'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1->num_rows > 0) {
        $row = mysqli_fetch_assoc($result1);
        $_SESSION['id'] = $row['id_traines'];
        if ($result1) {
            header("Location: user/index.php");
        }
    }

};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Study Center SBY</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <style>
         


p {
  font-family: 'Lato', sans-serif;
  letter-spacing: 1px;
  font-size:14px;
  color: #333333;
}

.header {
  position:relative;
  text-align:center;
  background: linear-gradient(60deg, rgb(173, 231, 146) 0%, rgba(0,172,193,1) 100%);
  color:white;
}


.inner-header {
  height:65vh;
  width:100%;
  margin: 0;
  padding: 0;
}

.flex { /*Flexbox for containers*/
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.waves {
  position:relative;
  width: 100%;
  height:15vh;
  margin-bottom:-7px; /*Fix for safari gap*/
  min-height:100px;
  max-height:150px;
}

.content {
  position:relative;
  height:20vh;
  text-align:center;
  background-color: white;
}

/* Animation */

.parallax > use {
  animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.parallax > use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.parallax > use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.parallax > use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}
@keyframes move-forever {
  0% {
   transform: translate3d(-90px,0,0);
  }
  100% { 
    transform: translate3d(85px,0,0);
  }
}
/*Shrinking for mobile*/
@media (max-width: 768px) {
  .waves {
    height:40px;
    min-height:40px;
  }
  .content {
    height:30vh;
  }
  h1 {
    font-size:24px;
  }
}
        </style>
       
    </head>
    
    <body>
        <!--Hey! This is the original version
of Simple CSS Waves-->

<div class="header">

<!--Content before waves-->
<div class="inner-header flex">
    <div class="card" style="width: 25rem;">
        <div class="card-header text-black text-capitalize">
            STUDY CENTER
          </div>
  <div class="card-body text-black">
    
  <form action="" method="POST">
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="username"  />
                                    <label for="inputEmail">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputPassword" name="password" type="password" />
                                    <label for="inputPassword">Password</label>
                                </div>
                                
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    
                                    <Button type="submit" name="masuk" class="btn btn-success" >Login</Button>
                                </div>
                            </form>
  </div>
</div>
</div>

<!--Waves Container-->
<div>
<svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
<defs>
<path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
</defs>
<g class="parallax">
<use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
<use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
<use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
<use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
</g>
</svg>
</div>
<!--Waves end-->

</div>
<!--Header ends-->

<!--Content starts-->
<div class="content flex">
  <p>By.Jerri Christian | Team Study Center </p>
</div>
<!--Content ends-->
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
