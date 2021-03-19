<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>YETTY THREADS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    
    
    
    <!-- Favicons -->
  <link href="js/img/favicon.png" rel="icon">

  
  <!-- Template Main CSS File -->
  <link href="js/css/style.css" rel="stylesheet">
    
    
     <link href="css/style.css" rel="stylesheet">
    
     <!-- Template Main JS File -->
     <script src="assets/js/main.js"></script>


    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    
    
     <!-- Vendor CSS Files -->
  <link href="js/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="js/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="js/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="js/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="js/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="js/vendor/aos/aos.css" rel="stylesheet">

    
    
    
     <!-- Vendor CSS Files(lumia) -->
     <link href="js/bootstrap.min.css" rel="stylesheet">
     <link href="js/icofont/icofont.min.css" rel="stylesheet">
  <link href="js/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="js/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    
    
    
</head>   


<style>
    .input{
        width: 150px;
        height: 30px;
        border: 200px #ffcc66;
        background-color: white;
        border-color: red;
        border-radius: 20px;
        margin-left: 25px;
        font-size: 15px;
        color: #000;
        font-family: Open Sans;
        
    }
    .input:hover{
        background-color: #cccccc;
    }
    
    .into{
        width: 200px;
        height: 30px;
        border: 40px #ffcc66;
        background-color: white;
        border-color: #ffcc66;
        border-radius: 20px;
        margin-left: 10px;
         font-size: 15px;
        color: #000;
        font-family: Open Sans;
        
    }
    .into:hover{
         background-color: #cccccc;
    }
    .butt{
        border: 1px solid whitesmoke;
        background-color: #9999ff;
        border-color: white;
        margin-left: -650px;
        width: 100px;
        height: 40px;
        border-radius: 20px;
        
    }
    .butt:hover{
        background-color: #999999;
    }
    
</style>

<body>
    
    <header style="background-color: wheat;">
        
         <div class="header-area header_area">
            <div class="main-header">
             <div class="header-bottom header-sticky">
        
        <div class="logo">
            <a style="margin-left: 60px;" href="index2.php"></a><img src="images/log1.png" width="60%">
        </div>
       
          <div class="header-left  d-flex f-right align-items-center">
              
       <div class="main-menu f-right d-none d-lg-block">
                        <nav> 
                            <ul id="navigation">                                                                                                                                     
                                <li><a style="font-weight: bold;" href="index2.php">Home</a></li>
                                <li><a style="font-weight: bold;" href="about.php">About</a></li>
                                <li><a style="font-weight: bold;" href="service.php">Services</a></li>
                                <li><a style="font-weight: bold;" href="gallery.php">Gallery</a>
                                </li>
                               
                            </ul>
                        </nav>
                    </div>
              
              
                 <div class="header-right-btn f-right d-none d-lg-block  ml-30">
                     <a href="visit.php" class="header-btn">Visit Us</a>
                    </div>
                </div>          
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
             </div>
            </div>
         </div>
                
                
    </header>

    
    <section style="background-color: #124364;" id="portfolio" class="portfolio">
        <center>
            <div style="color: white; font-size: 35px;font-family: Times New Roman;">PACE YOUR ORDER
            </div>
        </center>
    </section>
    
    <?php
    
    $link = mysqli_connect("localhost", "root", "", "bookings");
    
    $check_name = "";
    
     if(isset($_POST['reg_send'])){ 
        $reg_name = $_POST['reg_name'];
        
        $reg_phone = $_POST['reg_phone'];
        
        $reg_email = $_POST['reg_email'];
        
        $reg_style = $_POST['reg_style'];
        
         $reg_message = $_POST['reg_message'];
         
         
       
         $sql = "SELECT * FROM orders WHERE name = '$reg_name'";
         $sql_merge = mysqli_query($link, $sql);
         while( $row = mysqli_fetch_assoc($sql_merge)){
             $check_name = $row ['phone'];
         }
         if($check_name == ""){
             
              $sql_submit = "INSERT INTO orders (name, phone, email, style, message, status) VALUES('$reg_name', '$reg_phone', '$reg_email', '$reg_style', '$reg_message', 'Pending')";
        
        $merge = mysqli_query($link, $sql_submit);
       
         // printf("Errormessage: %s\n", mysqli_error($link));
        if($merge== true){
            echo "<script>alert('Success: Your order has been sent')</script>";
            
            
        } else{
             echo "<script>alert('Error: Order not sent')</script>";
            
        }
       
        } else{
             echo "<script>alert('You have placed an order!!!')</script>";
        }
         
         
         
    
     }
     
     
     
     
     
     
              
    if(isset($_GET['iddd'])){
        $id = $_GET['iddd'];
        $name = $_GET['name'];
        
        $_SESSION['id'] = $id;
       $sql_delete = "DELETE FROM orders WHERE id = '$id'";
        $merge_delete = mysqli_query($link, $sql_delete);
        
        if($merge_delete== true){
            echo "<script>alert('Deleted')</script>";
            
        }
        
    }

    ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    <form style="width: 2000px; height: 500px; background-color: black;"  name="order" action="order.php" method="POST" enctype="multipart/form-data">
        <br><br>
            <label style="font-size: 15px; margin-left: 20px; color: white; font-family: Georgia;">NAME:</label>
            <input class="input" type="text" name="reg_name" value="" required="true" placeholder="Ener Your Name" size="50" />
             <label style="font-size: 15px; color: white; margin-left: 350px; font-family: Georgia;">PHONE No:</label>
             <input class="into" type="number" name="reg_phone" value="" required="true" placeholder="Ener Your Phone Number" maxlength="50" />
        <br><br><br>
        <label style="font-size: 15px; margin-left: 20px; color: white; font-family: Georgia;">EMAIL:</label>
        <input class="input" type="email" name="reg_email" value=""  placeholder="Ener Your Email" size="50" />
            <label style="font-size: 15px; color: white; margin-left: 300px; font-family: Georgia;">CHOOSE STYLE:</label>
            <select name="reg_style" value="" style="width: 200px; font-size: 15px;" required="true" class="input" placeholder="Choose Your Style">
                <option>Choose Style Here</option>
                <option>AGBADA</option>
                <option>CASUALS</option>
                <option>SUITE</option>
                <option>KAFTAN</option>
            </select>
         <br><br>
       <center>
         <label style="font-size: 15px; color: white; font-family: Georgia; margin-left: -1500px;">(OPTIONAL):</label>
         <br>
      
          <textarea  name="reg_message" rows="25" placeholder="Input ypour measurement" style="width: 1300px; height: 100px; font-family: Open Sans; font-size: 35px; margin-left: -650px;"></textarea>
       </center>
         <br><br>
         <center>
             
             <input class="butt" type="submit" value="SEND" name="reg_send" />
              
         </center>
        
    </form>
    
    
    
    
    
     <script src="js/vendor/jquery/jquery.min.js"></script>
  <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="js/vendor/php-email-form/validate.js"></script>
  <script src="js/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="js/vendor/counterup/counterup.min.js"></script>
  <script src="js/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="js/vendor/venobox/venobox.min.js"></script>
  <script src="js/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="js/vendor/typed.js/typed.min.js"></script>
  <script src="js/vendor/aos/aos.js"></script>

    
    
    
    
    
    
    
    <!-- JS here -->
<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="./assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/animated.headline.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>



<!-- Jquery Plugins, main Jquery -->	
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>

 
</body>




</html>