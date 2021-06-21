<?php
// Connect to database
	include("../connection.php");
	
	$db = new dbObj();
	$connection =  $db->getConnstring();
	
	function get_posts($id=0)
	{
	 global $connection;
	 $query="SELECT * FROM posts";
	 if($id != 0)
	 {
	 $query.=" WHERE id=".$id." LIMIT 1";
	 }
	 $response=array();
	 $result=mysqli_query($connection, $query);
	 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	 {
	 $response[]=$row;
	 }
	 header('Content-Type: application/json');
	 echo json_encode($response);
	 //var_dump( json_encode($response));
	}
	function insert_posts()
	 {
	 global $connection;
	 $date = date('Y-m-d H:i:s');
	 
	 $data = json_decode(file_get_contents('php://input'), true);
	 //print_r($data);
	 
	 //$title=$body=$user_id=$post_thumbnail='';
	 
	 $title=$data["title"];
	 $body=$data["body"];
	 $user_id=$data["user_id"];
	 $post_thumbnail=$data["post_thumbnail"];
	 $query="INSERT INTO posts SET title='".$title."', body='".$body."', user_id='".$user_id."', post_thumbnail='".$post_thumbnail."'";
	//echo 	 $query;
	
	$number_of_rows=0;
	 if(mysqli_query($connection, $query))
	 {
		 $number_of_rows = mysqli_affected_rows($connection);
		 $response=array(
		 'status' => 1,
		 'status_message' =>'Employee Added Successfully.',
		 'number_of_affected_rows' => $number_of_rows
		 );
		 
	 }
	 else
	 {
	 $response=array(
	 'status' => 0,
	 'status_message' =>'Employee Addition Failed.'
	 );
	 }
	 //header('Content-Type: application/json');
	 echo json_encode($response);
	 }
	 function update_posts($id)
	{
		global $connection;
		$put_vars = json_decode(file_get_contents("php://input"),true);
		//$id=$put_vars["id"];
		$title=$put_vars["title"];
		$body=$put_vars["body"];
		
		$query="UPDATE posts SET title='".$title."', body='".$body."' WHERE id=".$id;
		
		//echo $query;
		$number_of_rows=0;
		
		if(mysqli_query($connection, $query))
		{
			$number_of_rows = mysqli_affected_rows($connection);
			 $response=array(
			 'status' => 1,
			 'status_message' =>'Post Updated  Successfully.',
			 'number_of_affected_rows' => $number_of_rows
			 );
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Employee Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	 
	 function delete_posts($id)
	{
		global $connection;
		$query="DELETE FROM posts WHERE id=".$id."";
		//promijeniti delete broj zahvacenih redaka
		$number_of_rows=0;
			
		if(mysqli_query($connection, $query))
		{
			$number_of_rows = mysqli_affected_rows($connection);
			 $response=array(
			 'status' => 1,
			 'status_message' =>'Post Deleted Successfully.',
			 'number_of_affected_rows' => $number_of_rows
			 );
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Post(s) Deletion Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

	 /******************************************************/

	$request_method=$_SERVER["REQUEST_METHOD"];

	
	switch($request_method)
	 {
	 case 'GET':
	 // Retrive Products
	 if(!empty($_GET["id"]))
	 {
	 $id=intval($_GET["id"]);
	 get_posts($id);
	 }
	 else
	 {
	 get_posts();
	 }
	 break;
	 default:
	 // Invalid Request Method
	 header("HTTP/1.0 405 Method Not Allowed");
	 break;
	case 'POST':
	// Insert Product
	insert_posts();
	break;
	case 'PUT':
	// Update Product
	$id=intval($_GET["id"]);
	update_posts($id);
	break;
	case 'DELETE':
	// Delete Product
	$id=intval($_GET["id"]);
	delete_posts($id);
	break;


	 }
?>