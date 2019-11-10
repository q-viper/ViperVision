<?php
	$host="localhost";
	$dbUser="root";
	$dbPassword="";
	$dbName="vipervision";
	$dbName2="notifications";
	$s=mysqli_connect($host,$dbUser,$dbPassword,$dbName)or die("Cannot connect to Db Server.");
	$not=mysqli_connect($host,$dbUser,$dbPassword,$dbName2);
?>  