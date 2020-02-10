<?php

include '../apps/connection.php';



 $fullName = $_POST['name'];
 $age = $_POST['age'];
 $carName = $_POST['car_name'];
 $id = $_POST['id'];
 $kelasName = $_POST['kelas'];

$response = mysqli_query($conn, "UPDATE `users` SET `fullname` = '$fullName', `age` = '$age', `car_name` = '$carName', `kelas_id` = '$kelasName' WHERE  `id` = $id;");

if($response) {
    header('Location: /crud');
} else {
    echo 'Error pak';
    var_dump($response);
}