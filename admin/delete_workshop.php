<?php include '../include/db.php'; ?>

<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM workshop WHERE id = {$id}";
        $delete_query = mysqli_query($connection, $query);
        if(!$delete_query)
        {
            die("QUERY FAILED ".mysqli_error($connection));
        }

        if($delete_query)
        {
            header("Location: index.php");
        }
    }
?>