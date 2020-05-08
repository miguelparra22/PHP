<?php
include("db.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * from tareas where id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
        

  
      
    }
}



if(isset($_POST['update'])){
    

    $id =$_GET['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE tareas set titulo = '$titulo', descripcion = '$descripcion' where id = $id";
    $result = mysqli_query($conn,$query);


    
$_SESSION['message'] = 'Tarea actualizada con exito';
    $_SESSION['message_type'] = 'warning';
    header("location:index.php");
    
}
?>


<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <form action="editar.php?id=<?php echo $_GET['id'];?>" method="post">

            <div class="form-group">
                <input type="text" name="titulo" value="<?php echo $titulo?>" class="form-control" placeholder="Actualiza el titulo">
            </div>

            <div class="form-group">
                <textarea  name="descripcion" value="" class="form-control" rows="10" placeholder="Actualiza la descripcion">
                <?php echo $descripcion?>
                </textarea>
            </div>

            <button class="btn btn-info" name="update">Actualizar</button>
            </form>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>