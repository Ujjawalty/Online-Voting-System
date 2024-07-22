<!-- IT IS ALL THE LOGIN BACKEND CODING -->

<?php
session_start(); // We need to write this line to access/start the $_SESSION variable.
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

// It is the query to check these record mobile, password, role is available in data or not
$check = mysqli_query($connect, "SELECT * FROM user WHERE mobile= '$mobile' AND password = '$password' AND role= '$role' ");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC);

    //$_SESSION variable is a global variable like a $_POST
    $_SESSION['userdata'] = $userdata; // in this we store userdata
    $_SESSION['groupsdata'] = $groupsdata; // in this we store groupsdata

    echo '
    <script>
    window.location = "../routes/dashboard.php";
    </script>
    ';
  

}
else{
    echo '
    <script>
    alert("Invalid Credentials OR User not fond!");
    window.location = "../";
    </script>
    ';
   
}

?>