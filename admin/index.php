

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Cell | Recruitment</title>
    <link rel="shortcut icon" href="../response/images/icon.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>

<body>
    <nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
      <div class="mb-2 sm:mb-0 inner">
    
        <a href="/home" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">E-Cell Recruitment</a><br>
    
      </div>
    </nav>
    <br><br>
    <div class="px-10">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <!-- <th>ERD ID</th> -->
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Scholar Number</th>
                    <th>Branch</th>
                    <th>Year</th>
                    <th>Vertical 1</th>
                    <th>Vertical 2</th>
                    <!--<th>Delete</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM recruitment";
                    $select_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_query))
                    {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['fname']}</td>";
                        echo "<td>{$row['lname']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['contact']}</td>";
                        echo "<td>{$row['scholar']}</td>";
                        echo "<td>{$row['branch']}</td>";
                        echo "<td>{$row['year1']}</td>";
                        echo "<td>{$row['v1']}</td>";
                        echo "<td>{$row['v2']}</td>";
                        // echo "<td><a href='delete.php?id={$row['id']}'><button type='submit' class='bg-blue hover:bg-blue-dark text-dark font-bold py-2 px-4 rounded'>Delete</button></a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    </script>
</body>

</html>