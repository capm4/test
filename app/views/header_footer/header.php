<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="/app/views/template/css/bootstrap.css" >
    <!-- Custom CSS -->
    <link  rel="stylesheet" type="text/css" href="/app/views/template/css/test.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- jQuery -->
    <script src="/app/views/template/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/app/views/template/js/bootstrap.js"></script>
    <script src="/app/views/template/js/js.js"></script>
    <title>Test Try</title>
</head>
<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <?php
                if(!isset($_SESSION['user_id']))
                {?>
                    <div class="col-4 text-right" style="width: 100%">
                        <a href="/login" class="btn">
                            Login
                        </a>
                    </div>
                <? }else
                    {?>
                        <div class="col-4 text-right" style="width: 100%">
                            <a href="/admin" class="btn">
                                admin menu
                            </a>
                            <a href="/logout" class="btn">
                                logout
                            </a>
                        </div>
                <?}
            ?>

        </div>
    </header>
