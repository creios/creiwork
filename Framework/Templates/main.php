<?php /** @var String $title */ ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->e($title) ?></title>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="bower_components/html5shiv/dist/html5shiv.min.js"></script>
    <script src="bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <?= $this->section('content') ?>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="bower_components/jquery/dist/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
