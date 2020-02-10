<?php

include '../apps/connection.php';

$id = $_GET['id'];
$fullName = $_GET['fullname'];



$query = mysqli_query($conn, 'DELETE FROM users WHERE id='.$id.';');
 

if($query) {
    echo "<script>
    alert('".$fullName." deleted');
    window.location = '/crud';
    </script>";
} else {
    echo 'not deleted ';
}


