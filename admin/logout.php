<?php
session_start();
session_unset();
session_destroy();
echo "<script> window.open('admin_register.php','_self')</script>";
