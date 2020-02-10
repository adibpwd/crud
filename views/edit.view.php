<?php 

    include'../apps/connection.php';

    $id = $_GET['id'];

    $users = mysqli_query($conn, "SELECT * FROM users WHERE id=$id;");
    
    while($user = mysqli_fetch_array($users)) {
        $fullName = $user['fullname'];
        $age = $user['age'];
        $carName = $user['car_name'];
        $kelasId = $user['kelas_id'];
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT</title>
</head>

<body>

    <div class="container py-5">
        <a href="/crud" class="btn btn-secondary mb-4">Back</a>
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h4>EDIT</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="../controllers/update.controller.php" method="POST">
                    <input type="hidden" name="id" value='<?= $id ?>'>
                    <div class="form-group">
                        <label for="name">nama</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" value="<?= $fullName?>">
                    </div>
                    <div class="form-group">
                        <label for="age">umur</label>
                        <input type="text" class="form-control form-control-sm" id="age" name="age" value="<?= $age?>">
                    </div>
                    <div class="form-group">
                        <label for="car_name">nama mobil</label>
                        <input type="text" class="form-control form-control-sm" id="car_name" name="car_name" value="<?= $carName?>">
                    </div>

                    <div class="form-group">
                            <label for="exampleFormControlSelect1">nama kelas</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="kelas">
                            <?php
                              $kelasNama = mysqli_query($conn, 'SELECT * FROM kelas;');
                              
                              $i = 0;
                            while($kelasnama = mysqli_fetch_array($kelasNama)) {
                                if( $kelasId == $kelasnama['id'] ) {
                                    ?> <option value='<?= $kelasnama['id'] ?>' selected><?php echo $kelasnama['kelas_name'];?></option>
                                <?php } else { ?>
                                    <option value='<?= $kelasnama['id'] ?>'><?php echo $kelasnama['kelas_name'];?></option>
                               <?php } ?>
                            <?php }?>
                            </select>
                            <br>
                   
                       
                    <button type="submit" class="btn btn-primary btn-sm btn-block">Simpan</button>
                </form>
            </div>
        </div>

    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>