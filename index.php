<?php
include("db.php");

include("includes/header.php");
include("includes/footer.php");
?>



<section class="container p-4">

    <div class="row">
        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php session_unset();
            } ?>
            <div class="card">
                <div class="card-body">
                    <form action="./guardar_tarea.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="titulo" class="form-control" placeholder="Ingrese titulo de la tarea" autofocus id="">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descripcion" rows="10" placeholder="Descripción de la tarea"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar tarea">
                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>

                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Fecha de creación</th>
                    <th>Acciones</th>


                </thead>
                <tbody>
                    <?php
                    $query = "Select * from tareas";
                    $resultado =  mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($resultado)) { ?>


                        <tr>
                            <td><?php echo $row['titulo'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>

                            <td><?php echo $row['creacion_at'] ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-warning">
                                    Editar
                                </a>
                                <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    Eliminar
                                </a>
                            </td>
                        </tr>



                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>