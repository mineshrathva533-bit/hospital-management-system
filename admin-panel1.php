<!DOCTYPE html>
<?php 
if (!isset($con) || !$con) {
    $con = mysqli_connect("127.0.0.1", "root", "", "myhmsdb");
}
include_once('newfunc.php');

if(isset($_POST['docsub']))
{
  $doctor=$_POST['doctor'];
  $dpassword=$_POST['dpassword'];
  $demail=$_POST['demail'];
  $spec=$_POST['special'];
  $docFees=$_POST['docFees'];
  $query="insert into doctb(username,password,email,spec,docFees)values('$doctor','$dpassword','$demail','$spec','$docFees')";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor added successfully!');</script>";
  }
}


if(isset($_POST['docsub1']))
{
  $demail=$_POST['demail'];
  $query="delete from doctb where email='$demail';";
  $result=mysqli_query($con,$query);
  if($result)
    {
      echo "<script>alert('Doctor removed successfully!');</script>";
  }
  else{
    echo "<script>alert('Unable to delete!');</script>";
  }
}


?>
<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom-theme.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg hms-navbar fixed-top">
        <a class="navbar-brand" href="#"><i class="fa fa-hospital-o" aria-hidden="true"></i> GLOBAL HOSPITALS </a>
        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>
<?php
$active_tab = 'list-dash';
if (isset($_GET['tab'])) {
    $active_tab = $_GET['tab'];
} elseif (isset($default_tab)) {
    $active_tab = $default_tab;
}
?>
    <div class="container-fluid">
     <div class="row">
   <div class="col-md-4 hms-sidebar">
     <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action <?php echo ($active_tab == 'list-dash') ? 'active' : ''; ?>" id="list-dash-list" data-toggle="list" href="#list-dash" role="tab" aria-controls="home">Dashboard</a>
      <a class="list-group-item list-group-item-action <?php echo ($active_tab == 'list-doc') ? 'active' : ''; ?>" href="#list-doc" id="list-doc-list" role="tab" data-toggle="list" aria-controls="home">Doctor List</a>
      <a class="list-group-item list-group-item-action <?php echo ($active_tab == 'list-pat') ? 'active' : ''; ?>" href="#list-pat" id="list-pat-list" role="tab" data-toggle="list" aria-controls="home">Patient List</a>
      <a class="list-group-item list-group-item-action <?php echo ($active_tab == 'list-app') ? 'active' : ''; ?>" href="#list-app" id="list-app-list" role="tab" data-toggle="list" aria-controls="home">Appointment Details</a>
      <a class="list-group-item list-group-item-action <?php echo ($active_tab == 'list-pres') ? 'active' : ''; ?>" href="#list-pres" id="list-pres-list" role="tab" data-toggle="list" aria-controls="home">Prescription List</a>
      <a class="list-group-item list-group-item-action <?php echo ($active_tab == 'list-settings') ? 'active' : ''; ?>" href="#list-settings" id="list-adoc-list" role="tab" data-toggle="list" aria-controls="home">Add Doctor</a>
      <a class="list-group-item list-group-item-action <?php echo ($active_tab == 'list-settings1') ? 'active' : ''; ?>" href="#list-settings1" id="list-ddoc-list" role="tab" data-toggle="list" aria-controls="home">Delete Doctor</a>
      <a class="list-group-item list-group-item-action <?php echo ($active_tab == 'list-mes') ? 'active' : ''; ?>" href="#list-mes" id="list-mes-list" role="tab" data-toggle="list" aria-controls="home">Queries</a>
    </div><br>
  </div>
  <div class="col-md-8">
     <h3 class="mb-4 font-weight-bold" style="color: var(--text);">WELCOME RECEPTIONIST</h3>
    <div class="tab-content" id="nav-tabContent">

      <div class="tab-pane fade <?php echo ($active_tab == 'list-dash') ? 'show active' : ''; ?>" id="list-dash" role="tabpanel" aria-labelledby="list-dash-list">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card text-center h-100 p-3">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                  <span class="fa-stack fa-2x mb-3"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                  <h4 class="card-title font-weight-bold mb-3">Doctor List</h4>
                  <script>
                    function clickDiv(id) {
                      document.querySelector(id).click();
                    }
                  </script> 
                  <p class="card-text">
                    <a href="#list-doc" onclick="clickDiv('#list-doc-list')" class="btn btn-outline-primary btn-sm font-weight-bold">
                      View Doctors
                    </a>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-4">
              <div class="card text-center h-100 p-3">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                  <span class="fa-stack fa-2x mb-3"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                  <h4 class="card-title font-weight-bold mb-3">Patient List</h4>
                  <p class="card-text">
                    <a href="#list-pat" onclick="clickDiv('#list-pat-list')" class="btn btn-outline-primary btn-sm font-weight-bold">
                      View Patients
                    </a>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-4">
              <div class="card text-center h-100 p-3">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                  <span class="fa-stack fa-2x mb-3"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                  <h4 class="card-title font-weight-bold mb-3">Appointments</h4>
                  <p class="card-text">
                    <a href="#list-app" onclick="clickDiv('#list-app-list')" class="btn btn-outline-primary btn-sm font-weight-bold">
                      View Appointments
                    </a>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card text-center h-100 p-3">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                  <span class="fa-stack fa-2x mb-3"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-list-ul fa-stack-1x fa-inverse"></i> </span>
                  <h4 class="card-title font-weight-bold mb-3">Prescription List</h4>
                  <p class="card-text">
                    <a href="#list-pres" onclick="clickDiv('#list-pres-list')" class="btn btn-outline-primary btn-sm font-weight-bold">
                      View Prescriptions
                    </a>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-6 mb-4">
              <div class="card text-center h-100 p-3">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                  <span class="fa-stack fa-2x mb-3"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i> </span>
                  <h4 class="card-title font-weight-bold mb-3">Manage Doctors</h4>
                  <p class="card-text">
                    <a href="#list-settings" onclick="clickDiv('#list-adoc-list')" class="btn btn-outline-primary btn-sm font-weight-bold mr-2">Add Doctor</a>
                    <a href="#list-settings1" onclick="clickDiv('#list-ddoc-list')" class="btn btn-outline-primary btn-sm font-weight-bold">Delete Doctor</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
                
      






      <div class="tab-pane fade <?php echo ($active_tab == 'list-doc') ? 'show active' : ''; ?>" id="list-doc" role="tabpanel" aria-labelledby="list-doc-list">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">
            <h4 class="card-title font-weight-bold mb-4" style="color: var(--primary);">Doctor List</h4>
            <form class="mb-4" action="doctorsearch.php" method="post">
              <div class="input-group">
                <input type="text" name="doctor_contact" placeholder="Search Doctor by Email ID..." class="form-control">
                <div class="input-group-append">
                  <button type="submit" name="doctor_search_submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                </div>
              </div>
            </form>
            <div class="table-responsive">
              <table class="table table-hover table-striped mb-0">
                <thead>
                  <tr>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Specialization</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Fees</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("127.0.0.1","root","","myhmsdb");
                    global $con;
                    $query = "select * from doctb";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $username = $row['username'];
                      $spec = $row['spec'];
                      $email = $row['email'];
                      $password = $row['password'];
                      $docFees = $row['docFees'];
                      
                      echo "<tr>
                        <td>$username</td>
                        <td>$spec</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>$docFees</td>
                      </tr>";
                    }

                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    

    <div class="tab-pane fade <?php echo ($active_tab == 'list-pat') ? 'show active' : ''; ?>" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">
      <div class="card shadow-sm border-0">
        <div class="card-body p-4">
          <h4 class="card-title font-weight-bold mb-4" style="color: var(--primary);">Patient List</h4>
          <form class="mb-4" action="patientsearch.php" method="post">
            <div class="input-group">
              <input type="text" name="patient_contact" placeholder="Search Patient by Contact Number..." class="form-control">
              <div class="input-group-append">
                <button type="submit" name="patient_search_submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
              </div>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
              <thead>
                <tr>
                <th scope="col">Patient ID</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Email</th>
                  <th scope="col">Contact</th>
                  <th scope="col">Password</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $con=mysqli_connect("127.0.0.1","root","","myhmsdb");
                  global $con;
                  $query = "select * from patreg";
                  $result = mysqli_query($con,$query);
                  while ($row = mysqli_fetch_array($result)){
                    $pid = $row['pid'];
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $gender = $row['gender'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $password = $row['password'];
                    
                    echo "<tr>
                      <td>$pid</td>
                      <td>$fname</td>
                      <td>$lname</td>
                      <td>$gender</td>
                      <td>$email</td>
                      <td>$contact</td>
                      <td>$password</td>
                    </tr>";
                  }

                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


      <div class="tab-pane fade <?php echo ($active_tab == 'list-pres') ? 'show active' : ''; ?>" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">
            <h4 class="card-title font-weight-bold mb-4" style="color: var(--primary);">Prescription List</h4>
            <div class="table-responsive">
              <table class="table table-hover table-striped mb-0">
                <thead>
                  <tr>
                  <th scope="col">Doctor</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescription</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $con=mysqli_connect("127.0.0.1","root","","myhmsdb");
                    global $con;
                    $query = "select * from prestb";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                      $doctor = $row['doctor'];
                      $pid = $row['pid'];
                      $ID = $row['ID'];
                      $fname = $row['fname'];
                      $lname = $row['lname'];
                      $appdate = $row['appdate'];
                      $apptime = $row['apptime'];
                      $disease = $row['disease'];
                      $allergy = $row['allergy'];
                      $pres = $row['prescription'];

                      
                      echo "<tr>
                        <td>$doctor</td>
                        <td>$pid</td>
                        <td>$ID</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$appdate</td>
                        <td>$apptime</td>
                        <td>$disease</td>
                        <td>$allergy</td>
                        <td>$pres</td>
                      </tr>";
                    }

                  ?>
                 </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade <?php echo ($active_tab == 'list-app') ? 'show active' : ''; ?>" id="list-app" role="tabpanel" aria-labelledby="list-app-list">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">
            <h4 class="card-title font-weight-bold mb-4" style="color: var(--primary);">Appointment Details</h4>
            <form class="mb-4" action="appsearch.php" method="post">
              <div class="input-group">
                <input type="text" name="app_contact" placeholder="Search Appointment by Contact Number..." class="form-control">
                <div class="input-group-append">
                  <button type="submit" name="app_search_submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                </div>
              </div>
            </form>
            <div class="table-responsive">
              <table class="table table-hover table-striped mb-0">
                <thead>
                  <tr>
                  <th scope="col">Appointment ID</th>
                  <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Appointment Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("127.0.0.1","root","","myhmsdb");
                    global $con;

                    $query = "select * from appointmenttb;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
                  ?>
                      <tr>
                        <td><?php echo $row['ID'];?></td>
                        <td><?php echo $row['pid'];?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['doctor'];?></td>
                        <td><?php echo $row['docFees'];?></td>
                        <td><?php echo $row['appdate'];?></td>
                        <td><?php echo $row['apptime'];?></td>
                        <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    {
                      echo "Active";
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      echo "Cancelled by Patient";
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      echo "Cancelled by Doctor";
                    }
                        ?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>

      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-adoc-list">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title font-weight-bold mb-4" style="color: var(--primary);">Add Doctor</h4>
            <form class="form-group" method="post" action="admin-panel1.php">
              <div class="form-group row">
                <label class="col-md-4 col-form-label font-weight-bold">Doctor Name:</label>
                <div class="col-md-8"><input type="text" class="form-control" name="doctor" onkeydown="return alphaOnly(event);" required></div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 col-form-label font-weight-bold">Specialization:</label>
                <div class="col-md-8">
                  <select name="special" class="form-control" id="special" required="required">
                    <option value="head" name="spec" disabled selected>Select Specialization</option>
                    <option value="General" name="spec">General</option>
                    <option value="Cardiologist" name="spec">Cardiologist</option>
                    <option value="Neurologist" name="spec">Neurologist</option>
                    <option value="Pediatrician" name="spec">Pediatrician</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 col-form-label font-weight-bold">Email ID:</label>
                <div class="col-md-8"><input type="email" class="form-control" name="demail" required></div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 col-form-label font-weight-bold">Password:</label>
                <div class="col-md-8"><input type="password" class="form-control" onkeyup='check();' name="dpassword" id="dpassword" required></div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 col-form-label font-weight-bold">Confirm Password:</label>
                <div class="col-md-8" id='cpass'>
                  <input type="password" class="form-control" onkeyup='check();' name="cdpassword" id="cdpassword" required>
                  <small id='message' class="d-block mt-1 font-weight-bold"></small>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-4 col-form-label font-weight-bold">Consultancy Fees:</label>
                <div class="col-md-8"><input type="text" class="form-control" name="docFees" required></div>
              </div>
              <div class="text-right">
                <input type="submit" name="docsub" value="Add Doctor" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="list-settings1" role="tabpanel" aria-labelledby="list-ddoc-list">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title font-weight-bold mb-4" style="color: var(--primary);">Delete Doctor</h4>
            <form class="form-group" method="post" action="admin-panel1.php" onsubmit="return confirmDeleteDoctor(event, this);">
              <div class="form-group row">
                <label class="col-md-4 col-form-label font-weight-bold">Email ID:</label>
                <div class="col-md-8"><input type="email" class="form-control" name="demail" required></div>
              </div>
              <div class="text-right">
                <input type="submit" name="docsub1" value="Delete Doctor" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>


       <div class="tab-pane fade" id="list-attend" role="tabpanel" aria-labelledby="list-attend-list">...</div>

       <div class="tab-pane fade <?php echo ($active_tab == 'list-mes') ? 'show active' : ''; ?>" id="list-mes" role="tabpanel" aria-labelledby="list-mes-list">
        <form class="form-group mb-4" action="messearch.php" method="post">
          <div class="row">
            <div class="col-md-10"><input type="text" name="mes_contact" placeholder="Enter Contact" class="form-control"></div>
            <div class="col-md-2"><input type="submit" name="mes_search_submit" class="btn btn-primary" value="Search"></div>
          </div>
        </form>
        
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                    $con=mysqli_connect("127.0.0.1","root","","myhmsdb");
                    global $con;

                    $query = "select * from contact;";
                    $result = mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result)){
              
                      #$fname = $row['fname'];
                      #$lname = $row['lname'];
                      #$email = $row['email'];
                      #$contact = $row['contact'];
                  ?>
                      <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
                        <td><?php echo $row['message'];?></td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
        <br>
      </div>



    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
   <script>
   function confirmDeleteDoctor(event, form) {
       event.preventDefault();
       swal({
           title: 'Delete Doctor?',
           text: 'Are you sure you want to delete this doctor?',
           type: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#0F766E',
           cancelButtonColor: '#64748B',
           confirmButtonText: 'Yes, Delete Doctor',
           cancelButtonText: 'Cancel'
       }).then(function(result) {
           if (result.value || result === true) {
               form.submit();
           }
       });
       return false;
   }
   </script>
   <script src="js/hms-export.js"></script>
  </body>
</html>
