<?php
$fileName = "test.jpg";
header("Content-Type:image/jpg");
header("Content-Disposition:attachment; filename=".$fileName."");
header("Content-Length:".filesize($fileName)."");

readfile($fileName);
?>