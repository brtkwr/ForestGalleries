<?php
$s = $_GET["s"];
$photoDir = "gallery/".($s?($s."/"):"");
?>

<head>

	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/style.css">	

	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>

	<title>Web Gallery : <?=$s?></title>
</head>

<body bgcolor="#000000">

<div align="center">

<table border="0" width="800" cellspacing="1" cellpadding="0">
	<tr>
		<td bgcolor="#522922">
		<img border="0" src="images/title.jpg" height="200"></td>
	</tr>
	<tr>
		<td>
		<h3 align="right"><a href="index.php">home</a> | 
		<a href="gallery.html">galleries</a> | <a href="contact.html">contact</a></h3>
		</td>
	</tr>
	<tr>
		<td>
<?php
include $photoDir."blurb.txt";
?>
		</td>
	</tr>
	<tr>
		<td>
		&nbsp;</td>
	</tr>
	<tr>
		<td>
<?php
if(!is_dir($photoDir)) die("Cuckoo! No $photoDir!");

if ($handle = opendir($photoDir)) {
	while (false !== ($file = readdir($handle))) {
		$fileArray[] = $file;
	}
	closedir($handle);

	for ($i=0; $i<count($fileArray); $i++){
		if (file_exists ($photoDir."thumbs/".$fileArray[$i]) && !($fileArray[$i] == "." || $fileArray[$i] == "..")){
			$photoArray[] = $fileArray[$i];
?>
<a href="<?=$photoDir.$fileArray[$i]?>" rel="lightbox<?=$s?("[".$s."]"):""?>" title="<?=$fileArray[$i]?>"><img src="<?=$photoDir."thumbs/".$fileArray[$i]?>" border="0"/></a>
<?php
		}
	}
}
?>
		</td>
	</tr>
</table>
</div>

