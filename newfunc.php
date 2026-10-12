<?php
if (!isset($con) || !$con) {
    $con = mysqli_connect("127.0.0.1", "root", "", "myhmsdb");
}
if (isset($_POST['update_data'])) {
    $contact = $_POST['contact'];
    $status = $_POST['status'];
    $query = "UPDATE appointmenttb SET payment='$status' WHERE contact='$contact';";
    $result = mysqli_query($con, $query);
    if ($result) {
        header("Location:updated.php");
        exit();
    }
}

function display_specs() {
    global $con;
    if (!isset($con) || !$con) {
        $con = mysqli_connect("127.0.0.1", "root", "", "myhmsdb");
    }
    $query = "SELECT DISTINCT(spec) FROM doctb;";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $spec = $row['spec'];
        echo '<option data-value="' . htmlspecialchars($spec) . '">' . htmlspecialchars($spec) . '</option>';
    }
}

function display_docs() {
    global $con;
    if (!isset($con) || !$con) {
        $con = mysqli_connect("127.0.0.1", "root", "", "myhmsdb");
    }
    $query = "SELECT username, docFees, spec FROM doctb;";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $username = $row['username'];
        $price = $row['docFees'];
        $spec = $row['spec'];
        echo '<option value="' . htmlspecialchars($username) . '" data-value="' . htmlspecialchars($price) . '" data-spec="' . htmlspecialchars($spec) . '">' . htmlspecialchars($username) . '</option>';
    }
}

// function display_specs() {
//   global $con;
//   $query = "select distinct(spec) from doctb";
//   $result = mysqli_query($con,$query);
//   while($row = mysqli_fetch_array($result))
//   {
//     $spec = $row['spec'];
//     $username = $row['username'];
//     echo '<option value = "' .$spec. '">'.$spec.'</option>';
//   }
// }


if(isset($_POST['doc_sub']))
{
 $username=$_POST['username'];
 $query="insert into doctb(username)values('$username')";
 $result=mysqli_query($con,$query);
 if($result)
  header("Location:adddoc.php");
}

?>
