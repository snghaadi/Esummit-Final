<?php include '../include/db.php'; ?>

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

            <a href="/home" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">E-Cell Workshop</a><br>

        </div>
    </nav>
    <br><br>
    <div class="px-10">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Team Name</th>
                    <th>Team College</th>
                    <th>Member 1</th>
                    <th>Member 2</th>
                    <th>Member 3</th>
                    <th>Member 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM bplan";
                $select_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_query)) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['team_name']}</td>";
                    echo "<td>{$row['team_college']}</td>";
                    echo "<td>{$row['name_1']}/{$row['email_1']}/{$row['number_1']}</td>";
                    echo "<td>{$row['name_2']}/{$row['email_2']}/{$row['number_2']}</td>";
                    echo "<td>{$row['name_3']}/{$row['email_3']}/{$row['number_3']}</td>";
                    echo "<td>{$row['name_4']}/{$row['email_4']}/{$row['number_4']}</td>";
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