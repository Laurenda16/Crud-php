<?php
include 'connect.php';

$id = $_GET['updateid'];

// Retrieve data based on the ID
$sql = "SELECT * FROM `crud` WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
mysqli_stmt_close($stmt);

if ($result && $row = mysqli_fetch_assoc($result)) {
    // Data found, populate form fields
    $name = htmlspecialchars($row['name']);
    $email = htmlspecialchars($row['email']);
    $mobile = htmlspecialchars($row['mobile']);
    $password = htmlspecialchars($row['password']);
} else {
    // Data not found or query error
    die(mysqli_error($con));
}

if (isset($_POST['submit'])) {
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $newMobile = $_POST['mobile'];
    $newPassword = $_POST['password'];

    // Update data in the database
    $updateSql = "UPDATE `crud` SET name=?, email=?, mobile=?, password=? WHERE id=?";
    $updateStmt = mysqli_prepare($con, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "ssssi", $newName, $newEmail, $newMobile, $newPassword, $id);
    $updateResult = mysqli_stmt_execute($updateStmt);
    mysqli_stmt_close($updateStmt);

    if ($updateResult) {
        echo "Update successful";

        header('location: display.php');
    } else {
        // Update operation failed
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./syle.css">
    <title>CRUD Operation - Modifier</title>
</head>

<body>
    <div class="header">
        <h1>Operation CRUD - Modifier</h1>
    </div>
    <div class="container my-5">
        <form method="post" action="">
            <div class="form-group">
                <label for="nom">Nom </label>
                <input name="name" type="text" class="form-control" autocomplete="off" placeholder="Enter your name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input name="email" type="email" class="form-control" autocomplete="off" placeholder="Enter email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mobile</label>
                <input name="mobile" type="text" class="form-control" autocomplete="off" placeholder="Enter votre numero" value="<?php echo $mobile; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password" value="<?php echo $password; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>