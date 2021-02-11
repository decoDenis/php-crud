<?php

include("db.php");

if (isset($_POST['save_task'])){
    // echo 'saving';

    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task(title,description) values('$title', '$description')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query failed");
    }

    // echo "saved";

    $_SESSION['message'] = 'Task saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");

    // echo $description;
    // echo $title;
}
?>