<?php
include('session.php');
include('config.php');

$_SESSION['pageStore'] = "home_doctor.php";

//if(!isset($_SESSION['login_id'])){
//  header("location: login.php"); // Redirecting To login
//}

//echo $session_id;

if (isset($_POST['appointment'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$department = $_POST['department'];
$doctor = $_POST['doctor'];
$message = $_POST['message'];

mysqli_query($conn, "INSERT INTO appointment (name, email, phone, date, department, doctor, message) VALUES ('$name', '$email', '$phone', '$date', '$department', '$doctor', '$message')");

}

if (isset($_POST['contact'])) {

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

mysqli_query($conn, "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')");

}

$appointment = mysqli_query($conn, "SELECT * FROM appointment");
$contact = mysqli_query($conn, "SELECT * FROM contact");
$ambulance = mysqli_query($conn, "SELECT * FROM ambulance");
$hospital = mysqli_query($conn, "SELECT * FROM hospital");
$department = mysqli_query($conn, "SELECT * FROM department");
$doctor = mysqli_query($conn, "SELECT * FROM doctor");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MedCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Logo -->
  <link href="assets/img/Logo.png" rel="Logo">
  <link href="assets/img/LogoF.png" rel="LogoF">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <!-- MDBootstrap Datatables  -->
  <link href="css/addons/datatables.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>	     
        
  #myTable th {
    background-color: #1977cc;
    color: white;
  }
  
  #myTable td {
    border-color: transparent;
  }


  </style>

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:medcare@gmail.com">medcare@gmail.com</a>
        <i class="bi bi-phone"></i> +88 016 **** ****
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">MedCare</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto">
      <img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="#hero">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="#Pharmacy">Pharmacy</a></li>
          <li><a class="nav-link scrollto" href="#Ambulance">Ambulance</a></li> --> 
          <li><a class="appointment scrollto" href="#appointment">Appointment List</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
      <?php
      // if($session_fullName == ''){
      //   echo '<a href="./login.php" class="nav-link scrollto">Login/Register</a>';
      // }
      // else {
      //   echo '<a href="./logout.php" class="nav-link scrollto">Logout</a>';
      // }
      ?>
      <a href="./logout.php" class="nav-link scrollto">Logout</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to MedCare</h1>
      <h2>MedCare is the solution to this modern world.</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    
    <!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <!-- <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
            <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox play-btn mb-4"></a>
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>About MedCare, It is the best way to connect patients with the doctors, pharmacy, and ambulance.</h3>
            <p>In the year 2020, we all face the Corona pandemic. For this pandemic, everywhere we go through long time lockdown.
              That is why no one goes out quickly.
              Some so many patients need doctor advice, medicine, but because of lockdown.
              It is hard for everyone to get doctor advice and treatment quickly.
              Many people need ambulances this pandemic, lack of ambulances and information made life harder for everyday people.
              That is why this idea came for easy accessibility for doctors’ advice, medicine, and available ambulance.
              One app multiple solutions, it will be easier for everyday people to get this services day today. </p>
          </div>
        </div>

      </div>
    </section> -->
    <!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <!-- <section id="counts" class="counts">
      <div class="container">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo mysqli_num_rows($doctor);?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Doctors</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fa fa-medkit"></i>
              <span data-purecounter-start="0" data-purecounter-end="22" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pharmacy</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="fa fa-ambulance"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?php echo mysqli_num_rows($ambulance);?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Ambulance</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="60" data-purecounter-duration="1" class="purecounter"></span>
              <p>Awards</p>
            </div>
          </div>

        </div>

      </div>
    </section>End Counts Section -->

    <!-- ======= Services Section ======= -->
    <!-- <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <p>MedCare provides excellent services to their patients.
            We aim to make  MedCare so effective that patients can easily connect to doctors, pharmacy and ambulances.
            We provide all services through this one Medcare system.
          </p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-user-md"></i></div>
              <h4><a href="">Doctors</a></h4>
              <p>The best doctors in the town are available in MedCare.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-medkit"></i></div>
              <h4><a href="">Pharmacy</a></h4>
              <p>MedCare has not only one pharmacy, and there are lots more pharmacies available.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-ambulance"></i></div>
              <h4><a href="">Ambulance</a></h4>
              <p>Don't worry about one ambulance MedCare can provide an alternative ambulance.</p>
            </div>
          </div>

        </div>

      </div>
    </section>End Services Section -->

     <!-- ======= Doctors Section ======= -->
     <!-- <section id="doctors" class="doctors">
      <div class="container">

        <div class="section-title">
          <h2>Doctors</h2>
          <p>In MedCare, there are many departments doctors are available. When you need to consult doctors, all-time someone will be available for your consult.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Brig Gen Prof Dr. Younusur Rahman (RETD)</h4>
                <span>Chief Medical Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Prof. Dr. Moarraf Hossain</h4>
                <span>Cancer Specialist</span>
                <p>Prof. Dr. Md. Moarraf Hossen, former Director cum Professor in National Institute of Cancer Research and Hospital, Dhaka.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Assoc. Prof. Dr. Indrajit Prasad</h4>
                <span>Endocrine Oncology</span>
                <p>MBBS (DMC), FCPS (Medicine) MD (Endocrinology)Medicine, Diabetes, Thyroid & Hormone Specialist (Endocrinologist)</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets/img/doctors/doctors-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Prof. Dr. Sirajul Islam</h4>
                <span>Hematology & Hemato Oncology</span>
                <p>Dr. Sirajul Islam MBBS. MCPS. FCPS. MD Trained in bone marrow transplant(Bangkok) Blood diseases and medicine specialist.</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>End Doctors Section -->


    <!-- ======= Ambulance Section ======= -->
    <section id="Ambulance" class="Ambulance">
      <div class="container">

        <div class="section-title">
          <!-- <h2>Ambulance</h2>
          <p>Ambulance services are not available when patients need emergency medical services in Bangladesh. But MedCare can arrange ambulances when it's necessary.</p> -->
        </div>
          <!-- <div class="col-lg-9 mt-8 mt-lg-0">
            <img src="assets/img/ambulance.png" alt="" class="img-fluid">
          </div> -->
        </div>
      </div>
    </section><!-- End Ambulance Section -->

    <!-- ======= Gallery Section ======= -->
    <!-- <section id="gallery" class="gallery">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <p>Here are some memorable moments described in pictures.</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="galelry-lightbox">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section>End Gallery Section -->

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Appointment List</h2>
          <!-- <p>Requesting an appointment fills up this information.
            Thank You.</p> -->
        </div>

        <!-- Table Pagination -->
        <table id="myTable" class="table table-hover">
          <thead class="">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Date</th>
              <th scope="col">Department</th>
              <th scope="col">Doctor</th>
              <th scope="col">Message</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; while($row = mysqli_fetch_array($appointment)) {?>
              <tr>
                <td><?php echo $i; ?></td>
                <td class=""><?php echo $row['name']; ?></td>
                <td class=""><?php echo $row['email']; ?></td>
                <td class=""><?php echo $row['phone']; ?></td>
                <td class=""><?php echo $row['date']; ?></td>
                <td class=""><?php echo $row['department']; ?></td>
                <td class=""><?php echo $row['doctor']; ?></td>
                <td class=""><?php echo $row['message']; ?></td>
              </tr>
              <?php $i++; } ?>

            <!-- <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr> -->
          </tbody>
        </table>

        <!-- <form action="home.php" method="POST" role="form" class="php-email-form"> -->
        <!-- <form action="home.php" method="post" role="form" class="email-form">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="department" id="department" class="form-select">
                <option value="" disabled>Select Department</option>
                <option value="Department 1">Department 1</option>
                <option value="Department 2">Department 2</option>
                <option value="Department 3">Department 3</option>
              </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="doctor" id="doctor" class="form-select">
                <option value="" disabled>Select Doctor</option>
                <option value="Doctor 1">Doctor 1</option>
                <option value="Doctor 2">Doctor 2</option>
                <option value="Doctor 3">Doctor 3</option>
              </select>
              <div class="validate"></div>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
          </div>
          <div class="text-center"><button class="appointment-btn" type="submit" name="appointment">Make an Appointment</button></div>
          
        </form> -->

      </div>
    </section><!-- End Appointment Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>If you want to contact us, you can visit our website or download the MedCare app.</p>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5162.022612880194!2d90.43009962897085!3d23.815000351623215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64be6744a57%3A0xeacead51ebe2bf60!2sIndependent%20University%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1637974271821!5m2!1sen!2sbd" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">
        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Plot 16 Aftab Uddin Ahmed Rd, Dhaka 1229</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>medcare@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+88 016 **** ****</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="home_doctor.php" method="post" class="email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
              </div>
              <div class="text-center"><button class="appointment-btn" type="submit" name="contact">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MedCare</h3>
            <p>
              Plot 16,<br>
              Aftab Uddin Ahmed Rd,<br>
              Dhaka 1229<br><br>
              <strong>Phone:</strong> +88 016 **** ****<br>
              <strong>Email:</strong> medcare@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Doctors</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Pharmacy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ambulance</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- MDBootstrap Datatables  -->
  <!-- <script type="text/javascript" src="js/addons/datatables.min.js"></script>
  
  <script>
    // Basic example
    $(document).ready(function () {
      $('#dtBasicExample').DataTable();
      $('.dataTables_length').addClass('bs-select');
    }); 
  </script> -->

  <script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>
</body>

</html>