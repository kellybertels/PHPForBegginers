<!DOCTYPE html>
<html>
<head>
    <title>PHP Course Blog</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/PHPForBegginers/css/styles.css">
    <link rel="stylesheet" href="/PHPForBegginers/css/jquery.datetimepicker.min.css">


</head>
<body>
<div class="container">
    <header>
        <h1>PHP Course Blog</h1>
    </header>
    <nav class="navbar navbar-light">
        <ul class = "nav">
            <li class = "nav-item"><a class = "nav-link" href="/PHPForBegginers">Home</a></li>
            <?php if (Auth::isLoggedIn()): ?>
                <li class = "nav-item"><a class = "nav-link" href='/PHPForBegginers/admin/'>Admin</a></li>
                <li class = "nav-item"><a class = "nav-link" href='/PHPForBegginers/logout.php'>Log out</a></li>
            <?php else: ?>
                <li class = "nav-item" ><a class = "nav-link" href='/PHPForBegginers/login.php'>Log in</a></li>
            <?php endif; ?>
            <li class = "nav-item" ><a class = "nav-link" href='/PHPForBegginers/contact.php'>Contact </a></li>
        </ul>
    </nav>

    <main >

