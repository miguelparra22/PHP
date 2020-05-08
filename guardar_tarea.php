


<?php

include ("db.php");

if(isset($_POST['guardar_tarea'])){
   $titulo = $_POST["titulo"];
   $des = $_POST["descripcion"];
   $query = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo','$des')";
   $result = mysqli_query($conn,$query);

   if(!$result){
       die("Fallo");
   }
   else{

     

    $_SESSION['message'] = 'Tarea guardada exitosamente';
    $_SESSION['message_type'] = 'success';
    
     header("Location: index.php");
   }


}else{
    echo "paila";
}

?>

