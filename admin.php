<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dylan's Guestbook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="navbar-nav justify-content-around w-100">
            <a class="nav-link" href="index.html">Resume</a>
            <a class="nav-link" href="guestbook.html">Guestbook Signup</a>
            <a class="nav-link" href="admin.php">Admin Portal</a>
        </div>
    </nav>
</header>

<div class="container my-5">

    <h3>Admin Data Table</h3>

    <table id="admin-table" class="display">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Company</th>
            <th>Position</th>
            <th>Email</th>
            <th>LinkedIn</th>
            <th>Meeting</th>
            <th>Creation Date</th>
        </tr>
        </thead>
        <tbody>

        <?
        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        //Connect to database
        @require('/home/dhardygr/connect.php');
        $cnxn = connect();

        $sql = "SELECT * FROM guestbook ORDER BY createdon DESC;";

        $results = mysqli_query($cnxn, $sql);

        foreach($results as $row){
            echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['first']} {$row['last']}</td>
                  <td>{$row['company']}</td>
                  <td>{$row['position']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['linkedin']}</td>
                  <td>{$row['meeting']}</td>
                  <td>{$row['createdon']}</td>                 
                  </tr>";
        }

        ?>

        </tbody>
    </table>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $('#admin-table').DataTable();
</script>
</body>
</html>
