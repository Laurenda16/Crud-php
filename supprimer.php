<?php
include 'connect.php';

if (isset($_GET['delid'])) {
    $id = $_GET['delid'];

    // Delete data from the database
    $deleteSql = "DELETE FROM `crud` WHERE id = ?";
    $deleteStmt = mysqli_prepare($con, $deleteSql);
    mysqli_stmt_bind_param($deleteStmt, "i", $id);
    $deleteResult = mysqli_stmt_execute($deleteStmt);
    mysqli_stmt_close($deleteStmt);

    if ($deleteResult) {
        header('location: display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
