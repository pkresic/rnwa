<?php

function get_employees($id=0)
{
	global $connection;
	$query="SELECT * FROM employees";
	if($id != 0)
	{
		$query.=" WHERE emp_no=".$id." LIMIT 100";
	}
	$response=array();
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$response[]=$row;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function insert_employee()
	{
		global $connection;

		$data = json_decode(file_get_contents('php://input'), true);
		$employee_bdate		=$data["employee_bdate"];
		$employee_fname		=$data["employee_fname"];
		$employee_lname		=$data["employee_lname"];
		//$employee_salary	=$data["employee_salary"];
		$employee_gender		=$data["employee_gender"];
		echo $query="INSERT INTO employees VALUES (NULL, '".$employee_bdate."','".$employee_fname."','".$employee_lname."', '".$employee_gender."',NOW())";
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Added Successfully.'
			);
		}
		else
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_employee($id)
	{
		global $connection;
		$post_vars = json_decode(file_get_contents("php://input"),true);
		$employee_fname		=$post_vars["employee_fname"];
		$employee_lname		=$post_vars["employee_lname"];
		$employee_gender	=$post_vars["employee_gender"];
		$employee_bdate		=$post_vars["employee_bdate"];
		$employee_hdate		=$post_vars["employee_hdate"];
		//$employee_age=$post_vars["employee_age"];
		
		$query="UPDATE employees SET first_name='".$employee_fname."', last_name='".$employee_lname."', gender='".$employee_gender."' WHERE emp_no=".$id;
		
		$result=mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);;
		
		if($result)
		{
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Employee Updation Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_employee($id)
{
	global $connection;
	$query="DELETE FROM employees WHERE emp_no=".$id;
	if($result = mysqli_query($connection, $query))
	{
		//$broj_redaka = mysqli_num_rows($result);
		$response=array(
			'status' => 1,
			//'brojredaka' => $broj_redaka,
			'status_message' =>'Employee Deleted Successfully.'
		);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Employee Deletion Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}


?>
