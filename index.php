<?php include("db.php")?>

<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])){?>
                    <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset(); }?>

                <div class="card card-body">
                    <form action="save.php" method="POST">
                        <div class="form-group p-1">
                            <input type="text" name="title" class="form-control" placeholder="Task tittle" autofocus>
                        </div>

                        <div class="form-group p-1">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                        </div>

                        <div>
                            <select name="roll" id="roll" class="form-control show-tick">
                                <option value="1">Administrador</option>
                                <option value="2">Empleado</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tttle</th>
                                <th>Description</th>
                                <th>Created date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM task";
                                $result_tasks = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result_tasks)){ ?>

                                <tr>
                                    <td><?php echo $row['title']?></td>
                                    <td><?php echo $row['description']?></td>
                                    <td><?php echo $row['created_at']?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                        <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
<?php include("includes/footer.php")?>