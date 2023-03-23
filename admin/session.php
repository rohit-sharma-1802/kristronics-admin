<?php
session_start();
include "include/_db.php";
include "include/_utilityfunction.php";
if (!isset($_SESSION['username'])) {
  redirect("./");
}

?>