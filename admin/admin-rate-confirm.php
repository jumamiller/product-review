<?php 
	$pid = $_GET['pid'];
	$treview = $_GET['treview'];

	$myfile = fopen("userReview.txt", "w") or die("Unable to open file!");
	$txt = $treview;
	fwrite($myfile, $txt."\n");
	fclose($myfile);

	$python = '../python.exe';
	$pyscript = 'rate.py';

	exec("admin/rate.py userReview.txt", $output);
	print_r($output);
	//echo $output[0];
	//$output_array = json_decode($output);
	foreach($output as $row){
		$rating = $row;
	}
	//$rate = $rating[1];
	//echo $rating;
	
	$sql = "update products set rating='$rating' where pid='$pid'";
	$conn = mysqli_connect("localhost","root","@Mj37055765");
	mysqli_select_db($conn,"ita");
	if($conn->query($sql)){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Product rating updated!!')
				window.location.href='admin-rate-product.php'
				</SCRIPT>");
	}

?>
