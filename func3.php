<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($con) || !$con) {
    $con = mysqli_connect("127.0.0.1", "root", "", "myhmsdb");
}
if (isset($_POST['adsub'])) {
    $username = mysqli_real_escape_string($con, $_POST['username1']);
    $password = mysqli_real_escape_string($con, $_POST['password2']);
    $query = "SELECT username FROM admintb WHERE username='$username' AND password='$password' LIMIT 1;";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        session_write_close();
        header("Location:admin-panel1.php");
        exit();
    } else {
        echo("<script>alert('Invalid Username or Password. Try Again!');
              window.location.href = 'index.php';</script>");
        exit();
    }
}
if(isset($_POST['update_data']))
{
	$contact=$_POST['contact'];
	$status=$_POST['status'];
	$query="update appointmenttb set payment='$status' where contact='$contact';";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:updated.php");
}




function display_docs()
{
	global $con;
	$query="select * from doctb";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$name=$row['name'];
		# echo'<option value="" disabled selected>Select Doctor</option>';
		echo '<option value="'.$name.'">'.$name.'</option>';
	}
}

if(isset($_POST['doc_sub']))
{
	$name=$_POST['name'];
	$query="insert into doctb(name)values('$name')";
	$result=mysqli_query($con,$query);
	if($result)
		header("Location:adddoc.php");
}
