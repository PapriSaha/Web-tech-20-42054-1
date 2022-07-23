<?php 

require_once '../model/db_connect.php';

function showAllUsers()
{
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
    try
    {
        $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showUser($id)
{
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `user_info` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } 
    catch (PDOException $e) 
    {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($user_name)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` WHERE username LIKE '%$user_name%'";

    try
    {
        $stmt = $conn->query($selectQuery);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function addUser($data)
{
	$conn = db_conn();
    $selectQuery = "INSERT into user_info (name, email, username, password, image)
    VALUES (:name, :email, :username, :password, :image)";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':email' => $data['email'],
        	':username' => $data['username'],
        	':password' => $data['password'],
        	':image' => $data['image']
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateUser($id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE userinfo SET name = ?, email = ?, username = ?, password = ?, phone = ?, address = ?, usertype = ?, gender = ?, dob = ?, image = ? where id = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        $data['name'], $data['email'], $data['username'], $data['password'], $data['phone'], $data['address'], $data['usertype'], $data['gender'], $data['dob'], $data['image'], $id]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function updateProfile($id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE userinfo SET name = ?, email = ?, username = ?, address = ?, phone = ?, gender = ?, dob = ? where id = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        $data['name'], $data['email'], $data['username'], $data['address'], $data['phone'], $data['gender'], $data['dob'], $id]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

function deleteUser($id)
{
	$conn = db_conn();
    $selectQuery = "DELETE FROM `userinfo` WHERE `id` = ?";
    try
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
// USER CRUD END
