<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to database
@require('/home/dhardygr/connect.php');
$cnxn = connect();

?>

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
    <link rel="stylesheet" href="styles/form-styles.css">
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
    <div class="jumbotron">
        <h1>Dylan Hardy's Guestbook</h1>
        <hr class="mx-2">
        <p class="lead">Sign my guestbook to keep in touch!</p>
    </div>

    <?

    $columnNames = [];
    $dataEntries = [];

    if (!empty($_POST['fname'])) {
        array_push($columnNames, "first");
        array_push($dataEntries, "'{$_POST['fname']}'");
    }

    if (!empty($_POST['lname'])) {
        array_push($columnNames, "last");
        array_push($dataEntries, "'{$_POST['lname']}'");
    }

    if (!empty($_POST['position'])) {
        array_push($columnNames, "position");
        array_push($dataEntries, "'{$_POST['position']}'");
    }

    if (!empty($_POST['company'])) {
        array_push($columnNames, "company");
        array_push($dataEntries, "'{$_POST['company']}'");
    }

    if (!empty($_POST['email'])) {
        array_push($columnNames, "email");
        array_push($dataEntries, "'{$_POST['email']}'");
    }

    if (!empty($_POST['linkedin'])) {
        array_push($columnNames, "linkedin");
        array_push($dataEntries, "'{$_POST['linkedin']}'");
    }

    if (!empty($_POST['meeting'])) {
        array_push($columnNames, "meeting");
        if ($_POST['meeting'] == 'other') {
            array_push($dataEntries, "'{$_POST['meeting']} - {$_POST['other']}'");
        } else {
            array_push($dataEntries, "'{$_POST['meeting']}'");
        }
    }

    if (!empty($_POST['message'])) {
        array_push($columnNames, "message");
        array_push($dataEntries, "'{$_POST['message']}'");
    }

    if (isset($_POST['mailinglist'])) {
        array_push($columnNames, "mailinglist");
        if ($_POST['mailinglist'] == 'on') {
            array_push($dataEntries, 1);
        } else {
            array_push($dataEntries, 0);
        }
    }

    if (!empty($_POST['mailtype'])) {
        array_push($columnNames, "mailtype");
        array_push($dataEntries, "'{$_POST['mailtype']}'");
    }

    $columnString = implode(", ", $columnNames);
    $valueString = implode(", ", $dataEntries);

    $sql = "INSERT INTO guestbook ({$columnString}) VALUES ({$valueString});";

    if(mysqli_query($cnxn, $sql)){
        echo '<h3>Thank you for your submission, it has been recorded in the guestbook.</h3>';
    } else {
        echo '<h3>There was an error with your submission, please try again later.</h3>';
    }
    ?>
</div>
</body>
</html>
