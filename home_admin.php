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

if (isset($_POST['hospital'])) {

  $hospital = $_POST['hospi'];
  
  mysqli_query($conn, "INSERT INTO hospital (hospital_name) VALUES ('$hospital')");
  
}

if (isset($_POST['ambulance'])) {

  $ambulance = $_POST['ambu'];
  
  mysqli_query($conn, "INSERT INTO ambulance (ambulance_name) VALUES ('$ambulance')");
  
}

if (isset($_POST['department'])) {

  $department = $_POST['depart'];
  
  mysqli_query($conn, "INSERT INTO department (department_name) VALUES ('$department')");
  
}

if (isset($_POST['doctor'])) {

  $doctor = $_POST['doct'];
  
  mysqli_query($conn, "INSERT INTO doctor (doctor_name) VALUES ('$doctor')");
  
}

$appointment = mysqli_query($conn, "SELECT * FROM appointment");
$contact = mysqli_query($conn, "SELECT * FROM contact");
$ambulance = mysqli_query($conn, "SELECT * FROM ambulance");
$hospital = mysqli_query($conn, "SELECT * FROM hospital");
$department = mysqli_query($conn, "SELECT * FROM department");
$doctor = mysqli_query($conn, "SELECT * FROM doctor");
$booking = mysqli_query($conn, "SELECT * FROM tbl_login");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
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

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> -->

  <style>	     
        
  #myTable th {
    background-color: #1977cc;
    color: white;
  }
  
  #myTable td {
    border-color: transparent;
  }

  #myTable2 th {
    background-color: #1977cc;
    color: white;
  }
  
  #myTable2 td {
    border-color: transparent;
  }

  #myTable3 th {
    background-color: #1977cc;
    color: white;
  }
  
  #myTable3 td {
    border-color: transparent;
  }

  /* Style the form - display items horizontally */
.form-inline {
  display: flex;
  flex-flow: row wrap;
  align-items: center;
}

/* Add some margins for each label */
.form-inline label {
  margin: 5px 10px 5px 0;
}

/* Style the input fields */
.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

/* Style the submit button */
.form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
}

.form-inline button:hover {
  background-color: royalblue;
}

/* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }

  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
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

      <h1 class="logo me-auto"><a href="home_admin.php">MedCare</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto">
      <img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Dashboard</a></li>
           <li><a class="nav-link scrollto" href="index2.php">Users</a></li>
           <li><a class="appointment scrollto" href="#appointment">Add Hospital, Ambulance, Department & Doctor</a></li>

          <!--<li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li><a class="nav-link scrollto" href="#Pharmacy">Pharmacy</a></li>
          <li><a class="nav-link scrollto" href="#Ambulance">Ambulance</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
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
  </section><!-- End Hero -->

  <main id="main">

    

    

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
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
    </section><!-- End Counts Section -->

    

     
    
        <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Add Hospital, Ambulance, Department & Doctor</h2>
          <!-- <p>Requesting an appointment fills up this information.
            Thank You.</p> -->
        </div>

        <form class="form-inline" action="home_admin.php" method="post">
          <label for="email"></label>
          <input type="text" id="hospital" placeholder="Enter Hospital" name="hospi">
          <button class="btn btn-primary btn-sm" type="submit" name="hospital">Submit</button>
        </form>

        <form class="form-inline" action="home_admin.php" method="post">
          <label for="email"></label>
          <input type="text" id="ambulance" placeholder="Enter Ambulance" name="ambu">
          <button class="btn btn-primary btn-sm" type="submit" name="ambulance">Submit</button>
        </form>

        <form class="form-inline" action="home_admin.php" method="post">
          <label for="email"></label>
          <input type="text" id="department" placeholder="Enter Department" name="depart">
          <button class="btn btn-primary btn-sm" type="submit" name="department">Submit</button>
        </form>

        <form class="form-inline" action="home_admin.php" method="post">
          <label for="email"></label>
          <input type="text" id="doctor" placeholder="Enter Doctor" name="doct">
          <button class="btn btn-primary btn-sm" type="submit" name="doctor">Submit</button>
        </form>

        <!-- <div class="container">
          <h3 align="center">How to use Tabledit plugin with jQuery Datatable in PHP Ajax</h3>
          <br />
          <div class="panel panel-default">
            <div class="panel-heading">Sample Data</div>
            <div class="panel-body">
            <div class="table-responsive">
              <table id="sample_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                </tr>
              </thead>
              <tbody></tbody>
              </table>
            </div>
            </div>
          </div>
          </div>
          <br />
          <br /> -->

      </div>
    </section><!-- End Appointment Section -->

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

            
          </tbody>
        </table>

      </div>
    </section><!-- End Appointment Section -->

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact List</h2>
          <!-- <p>Requesting an appointment fills up this information.
            Thank You.</p> -->
        </div>

        <!-- Table Pagination -->
        <table id="myTable2" class="table table-hover">
          <thead class="">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Subject</th>
              <th scope="col">Message</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; while($row = mysqli_fetch_array($contact)) {?>
              <tr>
                <td><?php echo $i; ?></td>
                <td class=""><?php echo $row['name']; ?></td>
                <td class=""><?php echo $row['email']; ?></td>
                <td class=""><?php echo $row['subject']; ?></td>
                <td class=""><?php echo $row['message']; ?></td>
              </tr>
              <?php $i++; } ?>

            
          </tbody>
        </table>

      </div>
    </section><!-- End Appointment Section -->

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Booking List</h2>
          <!-- <p>Requesting an appointment fills up this information.
            Thank You.</p> -->
        </div>

        <!-- Table Pagination -->
        <table id="myTable3" class="table table-hover">
          <thead class="">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Area</th>
              <th scope="col">Ambulance</th>
              <th scope="col">hospital</th>
              <th scope="col">address</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; while($row = mysqli_fetch_array($booking)) {?>
              <tr>
                <td><?php echo $i; ?></td>
                <td class=""><?php echo $row['email']; ?></td>
                <td class=""><?php echo $row['mobile_no']; ?></td>
                <td class=""><?php echo $row['gender']; ?></td>
                <td class=""><?php echo $row['first_name']; ?></td>
                <td class=""><?php echo $row['last_name']; ?></td>
                <td class=""><?php echo $row['address']; ?></td>
              </tr>
              <?php $i++; } ?>

            
          </tbody>
        </table>

      </div>
    </section><!-- End Appointment Section -->

    

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
  });
</script>

<script>
  $(document).ready( function () {
    $('#myTable2').DataTable();
  });
</script>

<script>
  $(document).ready( function () {
    $('#myTable3').DataTable();
  });
</script>

<!-- <script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#sample_data').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : {
   url:"fetch.php",
   type:"POST"
  }
 });

 $('#sample_data').on('draw.dt', function(){
  $('#sample_data').Tabledit({
   url:'action.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
    editable:[[1, 'first_name'], [2, 'last_name'], [3, 'gender', '{"1":"Male","2":"Female"}']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#sample_data').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 
</script> -->
</body>

</html>


