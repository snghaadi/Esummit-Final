<?php
$connection = mysqli_connect('localhost','u862867315_root_5','Utkarsh@3112','u862867315_recruitment');
?>

<?php
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = "DELETE FROM recruitment WHERE id = {$id}";
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