<?php
//Session start
session_start();

//delete all session
 session_unset();

//destroy session
session_destroy();


echo "<script>location.href='index.php'</script>";
 ?>