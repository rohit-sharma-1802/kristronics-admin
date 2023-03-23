<?php
session_start();
include "include/_utilityfunction.php";
session_unset();
session_destroy();
redirect("./");


?>