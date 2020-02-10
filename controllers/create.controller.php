<?php

include '../apps/connection.php';



 $fullName = $_POST['name'];
 $age = $_POST['age'];
 $carName = $_POST['car_name'];
 $kelasId =$_POST['kelas'];

 echo $kelasId;

$response = mysqli_query($conn, "INSERT INTO users (fullname, age, car_name, kelas_id) VALUES ('$fullName', '$age', '$carName', '$kelasId');");

if($response) {
    header('Location: /crud');
} else {
    echo 'Error pak';
    var_dump($response);
}