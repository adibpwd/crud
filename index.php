<?php 

        include 'apps/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
</head>
<body>
    <div class="container py-5">
        <a href="./views/create.view.php" class="btn btn-primary mb-4">Create</a>
<br>
        <table class="table table-sm">
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Mobil</th>
                <th>kelas</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                    $users = mysqli_query($conn, "SELECT users.id, users.fullname, users.age, users.car_name, kelas.kelas_name FROM users INNER JOIN kelas ON users.kelas_id = kelas.id
                    ");
                    $no = 1;
                    if($users->num_rows) {
                        while($user = mysqli_fetch_array($users)) { ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $user['fullname'] ?></td>
                                <td><?= $user['age']?></td>
                                <td><?= $user['car_name']?></td>
                                <td><?= $user['kelas_name']?></td>
                                <td>
                                <a href="./views/edit.view.php?id=<?= $user['id']?>" class='btn btn-sm btn-warning'>Edit</a>
                                <a href="./controllers/delete.controller.php?id=<?= $user['id']?>&fullname=<?=$user['fullname']?>" class='btn btn-sm btn-danger'>Delete</a>
                                </td>
                            </tr>
                        <?php } ?> 
                   <?php } else { ?>
                        <tr>
                            <td class="h4 text-center" colspan="5">data kosong</td>
                        </tr>

                     <?php  } ?> 
               
            </tbody>
        </table>
    </div>


<script src="./assets/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>