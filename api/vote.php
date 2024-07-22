<!-- Here we do the voting backend coding -->
<?php
session_start(); // Here we start the session
include('connect.php'); //Here we include the connection

// Here we are collecting the values
$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid =$_POST['gid'];
$uid =$_SESSION['userdata']['id'];

// Here we update the votes
$update_votes = mysqli_query($connect, "UPDATE user SET votes ='$total_votes' WHERE id= '$gid' ");
// Here we update the user status
$update_user_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id ='$uid' ");

if($update_votes and $update_user_status){
    
    $groups = mysqli_query($connect,"SELECT * FROM user WHERE  role=2");
    $groupsdata= mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata']['status'] = 1; // in this we store userdata
    $_SESSION['groupsdata'] = $groupsdata; // in this we store groupsdata

    echo '
    <script>
    alert("Votting Successful!");
    window.location = "../routes/dashboard.php";
    </script>
    ';
   

}
else{
    echo '
    <script>
    alert("Some error occured!");
    window.location = "../routes/dashboard.php";
    </script>
    ';
   
}
?>