<?php
session_start();
session_destroy(); // Destroy means to end the session
header("location:../");
?>