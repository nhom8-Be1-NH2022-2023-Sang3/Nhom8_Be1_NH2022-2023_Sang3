<?php
session_start();
unset($_SESSION['role']);
header('location: ../doantest/login.php');