<?php
session_start();

if (!($_SESSION['email'])) {
    header("Location:../view/sign-in.php");
}
