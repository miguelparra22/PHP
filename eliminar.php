<?php
include ("db.php");


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "Delete from tareas where id = $id";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("fallo");
    }

    $_SESSION['message'] = 'Tarea eliminada con exito';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");

}

?>