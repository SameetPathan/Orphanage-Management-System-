
<?php
   session_start();
   unset($_SESSION["aadharcard"]);
   unset($_SESSION["password"]);
   
   echo 'Logging You Out...';
   header('Refresh: 2; URL = /Orphanage Management System/index.php');
?>