<?php
$link = mysqli_connect("localhost", "root","root","empleadossmt");
$acentos = $link->query("SET NAMES 'utf8'");
