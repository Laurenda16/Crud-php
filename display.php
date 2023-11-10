Certainly! Below is a stylized version of your "display.php" page. I've added some Bootstrap styling to enhance the visual appearance:

```php
<?php
include 'connect.php';

$sql = "SELECT * FROM `crud`";
$result = mysqli_query($con, $sql);

if (!$result) {
    die(mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="syle.css">
    <title>Crud operation</title>
</head>

<body>
    <div class="header bg-warning text-light text-center py-4">
        <h1>Operation Crud</h1>
    </div>
    <div class="container my-5">
        <a href="user.php" class="btn btn-primary mb-3">Ajouter Utilisateur</a>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = htmlspecialchars($row['name']);
                    $email = htmlspecialchars($row['email']);
                    $mobile = htmlspecialchars($row['mobile']);
                    $password = htmlspecialchars($row['password']);
                    echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $mobile . '</td>
                            <td>' . $password . '</td>
                            <td>
                                <button class="btn btn-success"><a href="modifier.php?updateid=' . $id . '" class="text-light">Modifier</a></button>
                                <button class="btn btn-danger"><a href="supprimer.php?delid=' . $id . '" class="text-light">Supprimer</a></button>
                            </td>
                        </tr>';
                }
                ?>

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>