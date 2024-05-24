<?php
if (isset($_POST['submit'])) {
    $servername = 'localhost';
    $serverusername = 'root';
    $serverpassword = '';
    $serverpassword = '';
    $serverdatabase = 'websitedata';

    $conn = mysqli_connect($servername, $serverusername,$serverpassword, $serverdatabase);

    //Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $serverdatabase";
    if (mysqli_query($conn,$sql)) {
        echo "Database Created";
    } 
    else {
        echo "Database Failed to Create ".mysqli_error($conn);
    }

    $username = $_POST['studentID'];
    $password = $_POST['password'];

    mysqli_select_db($conn,"websitedata");
    $sqlCreateTBStudent = "CREATE TABLE IF NOT EXISTS logindataStudent (studentID int(12) auto_increment, email varchar(14), password varchar(32), primary key(studentID))";
    if (mysqli_query($conn,$sqlCreateTBStudent)) {
        echo "Created Table for Students";
    }
    else {
        echo "Table Creation Error". mysqli_error($conn);
    }
    $sqlCreateTBStaff = "CREATE TABLE IF NOT EXISTS logindataStaff (staffID int(12) auto_increment, email varchar(14),password varchar(32), primary key(staffID))";
    if (mysqli_query($conn,$sqlCreateTBStaff)) {
        echo "Created Table for Staff";
    }
    else {
        echo "Table Creation Error". mysqli_error($conn);
    }

}

?>