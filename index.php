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

     <title>STUDY CENTER SURABAYA</title>
<!-- 
Hydro Template 
http://www.templatemo.com/tm-509-hydro
-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/magnific-popup.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="index.html" class="navbar-brand">STUDY CENTER SURABAYA</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="#home" class="smoothScroll">BERANDA</a></li>
                         <li><a href="#about" class="smoothScroll">TENTANG KAMI</a></li>
                         <li><a href="#blog" class="smoothScroll">DAFTAR KELAS</a></li>
                         <!-- <li><a href="#work" class="smoothScroll">KESAKSIAN</a></li> -->
                         <!-- <li><a href="#contact" class="smoothScroll">KONTAK KAMI</a></li> -->
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <!-- <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                         <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                         <li><a href="#"><i class="fa fa-instagram"></i></a></li> -->
                         <li class="section-btn"><a href="#" data-toggle="modal" data-target="#modal-form">MASUK</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- HOME -->
     <section id="home" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="home-info">
                              <h1>Komunitas Belajar dan Rumah Kedua Remaja 
Sehat, Positif dan Berprestasi</h1>
                              <a href="https://docs.google.com/forms/d/e/1FAIpQLSeoL7IT7060IMGdJWgJw6PHWNTPqwaDKQ5OwTFZZ85v_F7D_w/viewform" class="btn section-btn smoothScroll">DAFTAR SEKARANG</a>
                              <!-- <span>
                                   CALL US (+66) 010-020-0340
                                   <small>For any inquiry</small>
                              </span> -->
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="home-video">
                              <div class="embed-responsive embed-responsive-16by9">
                                   <iframe src="https://www.youtube.com/embed/fAF2GthxDXk" frameborder="0" allowfullscreen></iframe>
                              </div>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>


     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-5 col-sm-6">
                         <div class="about-info">
                              <div class="section-title">
                                   <h2>STUDY CENTER</h2>
                                   <span class="line-bar">...</span>
                              </div>
                              <p>Study center adalah sebuah wadah non profit yang berada dibawah naungan Yayasan Bejana Mulia, yang bertujuan untuk membantu, membina, dan mendidik, generasi muda dalam aspek pendidikan, karakter, dan ketaatan kepada Tuhan. </p>
                              <p>Sehingga masa muda mereka diisi dengan hal-hal positif dan mereka memiliki kesempatan yang sama dengan orang lain untuk meraih kesuksesan dan menjadi berkat bagi banyak orang.</p>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <div class="about-info">
                              <div class="section-title">
                                   <h2>VISI</h2>
                              </div>
                              <p>Menjadikan Study Center sebagai rumah kedua dimana setiap remaja bisa mendapatkan sebuah komunitas yang sehat di luar rumah. </p>
                         </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-12">
                         <div class="about-info">
                              <div class="section-title">
                                   <h2>MISI</h2>
                              </div>
                              <p>Membentuk sebuah komunitas remaja yang sehat, positif, dan prestasi <br> (berkaitan dengan pendidikan, karakter, dan ketaatan kepada Tuhan). </p>
                         </div>
                    </div>
                    
               </div>
          </div>
     </section>
     <P><P></P></P><P></P>
 

     <!-- BLOG -->
     <section id="blog" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>DAFTAR KELAS</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <!-- <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="images/blog-image1.jpg" class="img-responsive" alt=""></a>
                              </div> -->
                              <div class="media-body blog-info">
                                   <small>Kelas ini dibuka untu semua jenjang SD, SMP dan SMA.</small>
                                   <h3>Kelas Reguler</h3>
                                   <p>Kelas reguler ini berisi materi pembelajaran untuk mata pelajaran umum seperti matematika, fisika, kimia dan biologi.</p>
                                   <!-- <h3>Kelas Reguler</h3> -->
                                   <!-- <a href="blog-detail.html" class="btn section-btn">Read article</a> -->
                              </div>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <!-- <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="images/blog-image2.jpg" class="img-responsive" alt=""></a>
                              </div> -->
                              <div class="media-body blog-info">
                                   <small> Dibuka untuk kelas 3 SMP dan 3 SMA.</small>
                                   <h3>Kelas Intensif</h3>
                                   <p>Kelas intensif ini adalah kelas yang berisi materi dan pembelajaran khusus untuk persiapan ujian nasional.</p>
                                   <!-- <a href="blog-detail.html" class="btn section-btn">Read more</a> -->
                              </div>
                         </div>
                    </div>

                    <!-- <div class="col-md-6 col-sm-6">
                     
                         <div class="media blog-thumb">
                            
                              <div class="media-body blog-info">
                             
                                   <h3>Ekstrakurikuler</h3>
                                   <p>Ektrakurikuler Study Center menyediakan berbagai akifitas seperti kelas musik, olahraga dan keterampilan. Pengembangan bakat dan hobi, diantaranya : basket, futsal, badminton, keyboard, gitar, memasak, bahasa Inggris, bahasa Mandarin, dan komputer.</p>
                                  
                              </div>
                         </div>
                    </div> -->

                    
               </div>
          </div>
     </section>


     <!-- WORK -->
     <!-- <section id="work" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>KESAKSIAN</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                   
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="images/blog-image4.jpg" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i> December 10, 2017</small>
                                   <h3><a href="blog-detail.html">minimalist design trend in 2018.</a></h3>
                                   <p>Lorem ipsum dolor sit consectetur adipiscing morbi venenatis.</p>
                                   <a href="blog-detail.html" class="btn section-btn">View Detail</a>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                   
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="images/blog-image4.jpg" class="img-responsive" alt=""></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i> December 10, 2017</small>
                                   <h3><a href="blog-detail.html">minimalist design trend in 2018.</a></h3>
                                   <p>Lorem ipsum dolor sit consectetur adipiscing morbi venenatis.</p>
                                   <a href="blog-detail.html" class="btn section-btn">View Detail</a>
                              </div>
                         </div>
                    </div>

                  

               </div>
          </div>
     </section> -->

     <!-- CONTACT -->
     <!-- <section id="contact" data-stellar-background-ratio="0.5"> -->
          <!-- <div class="container"> -->
               <!-- <div class="row"> -->

                    <!-- <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Contact us</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div> -->

                    <!-- <div class="col-md-8 col-sm-8"> -->
                        
                         <!-- CONTACT FORM HERE -->
                         <!-- <form id="contact-form" role="form" action="#" method="post">
                              <div class="col-md-6 col-sm-6">
                                   <input type="text" class="form-control" placeholder="Full Name" id="cf-name" name="cf-name" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="email" class="form-control" placeholder="Your Email" id="cf-email" name="cf-email" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <input type="tel" class="form-control" placeholder="Your Phone" id="cf-number" name="cf-number" required="">
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <select class="form-control" id="cf-budgets" name="cf-budgets">
                                        <option>Budget Level</option>
                                        <option>$500 to $1,000</option>
                                        <option>$1,000 to $2,200</option>
                                        <option>$2,200 to $4,500</option>
                                        <option>$4,500 to $7,500</option>
                                        <option>$7,500 to $12,000</option>
                                        <option>$12,000 or more</option>
                                   </select>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                   <textarea class="form-control" rows="6" placeholder="Your requirements" id="cf-message" name="cf-message" required=""></textarea>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="submit" value="Send Message">
                              </div>

                         </form> -->
                    <!-- </div> -->

                    <!-- <div class="col-md-4 col-sm-4"> -->
                         <!-- <div class="google-map"> -->
	<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
                              <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" allowfullscreen></iframe> -->
                         <!-- </div> -->
                    </div>

               </div>
          </div>
     </section>


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-5 col-sm-12">
                         <div class="footer-thumb footer-info"> 
                              <h2>STUDY CENTER SURABAYA</h2>
                              <p>SEBAGAI RUMAH KEDUA KOMUNITAS REMAJA SEHAT, POSITIF DAN BERPRESTASI</p>
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <!-- <h2>Company</h2>
                              <ul class="footer-link">
                                   <li><a href="#">About Us</a></li>
                                   <li><a href="#">Join our team</a></li>
                                   <li><a href="#">Read Blog</a></li>
                                   <li><a href="#">Press</a></li>
                              </ul> -->
                         </div>
                    </div>

                    <div class="col-md-2 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <!-- <h2>Services</h2>
                              <ul class="footer-link">
                                   <li><a href="#">Pricing</a></li>
                                   <li><a href="#">Documentation</a></li>
                                   <li><a href="#">Support</a></li>
                              </ul> -->
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h2>LOKASI KAMI</h2>
                              <p>Darmo Permai Selatan No.35, Pradahkali Kendal, Dukuh Pakis, KOTA SURABAYA, DUKUH PAKIS, JAWA TIMUR, ID, 60225</p>
                         </div>
                    </div>                    

                    <!-- <div class="col-md-12 col-sm-12">
                         <div class="footer-bottom">
                              <div class="col-md-6 col-sm-5">
                                   <div class="copyright-text"> 
                                        <p>Copyright &copy; 2017 Your Company</p>
                                   </div>
                              </div>
                              <div class="col-md-6 col-sm-7">
                                   <div class="phone-contact"> 
                                        <p>Call us <span>(+66) 010-020-0340</span></p>
                                   </div>
                                   <ul class="social-icon">
                                        <li><a href="https://www.facebook.com/templatemo" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                   </ul>
                              </div>
                         </div>
                    </div> -->
                    
               </div>
          </div>
     </footer>


     <!-- MODAL -->
     <section class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
               <div class="modal-content modal-popup">

                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

                    <div class="modal-body">
                         <div class="container-fluid">
                              <div class="row">

                                   <div class="col-md-12 col-sm-12">
                                        <div class="modal-title">
                                             <h2>STUDY CENTER SURABAYA</h2>
                                        </div>

                                        <!-- NAV TABS -->
                                        <ul class="nav nav-tabs" role="tablist">
                                             <!-- <li class="active"><a href="#sign_up" aria-controls="sign_up" role="tab" data-toggle="tab">Create an account</a></li> -->
                                             <li class="active"><a href="#sign_in"  aria-controls="sign_in" role="tab" data-toggle="tab">Masuk</a></li>
                                        </ul>

                                        <!-- TAB PANES -->
                                        <div class="tab-content">
                                             <!-- <div role="tabpanel" class="tab-pane fade in active" id="sign_up">
                                                  <form action="#" method="post">
                                                       <input type="text" class="form-control" name="name" placeholder="Name" required>
                                                       <input type="telephone" class="form-control" name="telephone" placeholder="Telephone" required>
                                                       <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                       <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                       <input type="submit" class="form-control" name="submit" value="Submit Button">
                                                  </form>
                                             </div> -->

                                             <div role="tabpanel" class="tab-pane fade in active" id="sign_in">
                                                  <form action="" method="post">
                                                       <input type="text" class="form-control" name="username" placeholder="Email" required>
                                                       <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                       <input type="submit" class="form-control" name="masuk" value="Masuk">
                                                       <!-- <a href="https://www.facebook.com/templatemo">Forgot your password?</a> -->
                                                  </form>
                                             </div>
                                        </div>
                                   </div>

                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/jquery.magnific-popup.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>