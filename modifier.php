<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "Select * from `crud` where id ='$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = " update  `crud` set id =$id,
    name ='$name',
    email ='$email',
    mobile='$mobile',
    password ='$password'  where id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Update succ  successfully";
        //header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./syle.css">
    <title>crud Operation</title>
</head>

<body>
    <div class="header">
        <h1>Operation Crud</h1>
    </div>
    <div class="container my-5">

        <form method="post" action="">
            <div class="form-group">
                <label for="nom">Nom </label>
                <input name="name" type="text" class="form-control" autocomplete="off" placeholder="Enter your name">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input name="email" type="email" class="form-control" autocomplete="off" placeholder="Enter email">

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Mobile</label>
                <input name="mobile" type="text" class="form-control" autocomplete="off" placeholder="Enter votre numero">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>