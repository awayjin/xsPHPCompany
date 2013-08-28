<?php
session_start();

require_once("validationCode.php");
$image = new ValidationCode(100, 40, 6);
$image->showImage();

$_SESSION['validationCode'] = $image->getCheckCode();

?>