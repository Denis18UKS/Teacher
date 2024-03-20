<?php
    include("../connectDB.php");

    if(isset($_GET['met_id'])) {
        $met_id = $_GET['met_id'];

        $delete_query = "DELETE FROM `metodichki` WHERE id = $met_id";
        
        if(mysqli_query($connect, $delete_query)) {
            echo "<script>location.href= 'admin.php'; </script>";
        } else {
            echo "Ошибка при удалении методички: " . mysqli_error($connect);
        }
    } else {
        echo "Идентификатор методички не передан.";
    }
?>