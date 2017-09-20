<?php

	if($_SERVER['REQUEST_METHOD']=='POST') {

		$username = $_POST['username'];

		require_once('dbConnect.php');

		$return_arr = array();
		$sql = "SELECT * FROM user_information where firebaseuid = '$username'";
		$result = mysqli_query($con,$sql);

		$response = array();
		$response['data'] = array();

		while($row = mysqli_fetch_array($result)) {
			$temp = array();
			$temp['firebaseuid']=$row['firebaseuid'];
			$temp['enrollment_number']=$row['enrollment_number'];
			$temp['fname']=$row['fname'];
			$temp['lname']=$row['lname'];
			$temp['user_type']=$row['user_type'];

			array_push($response['data'],$temp);
		}
		echo json_encode($response );
	} else {
		echo 'error';
	}
	
?>
