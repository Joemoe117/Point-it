<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

        <title><?=$titre?></title>

        <!-- Bootstrap core CSS -->
        <link href=" <?= base_url("/assets/css/bootstrap.min.css");  ?>    " rel="stylesheet">
        <link href=" <?= base_url("/assets/css/style.css");  ?>    " rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="http://ivaynberg.github.io/select2/select2-3.4.1/select2.css"/>

        <!-- FONT -->
        <link href='http://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet' type='text/css'>


        <!-- Javascript Bootstrap, JQuery et Jquery UI -->
        <script type="text/javascript" src="<?= base_url("/assets/js/jquery-2.1.0.min.js");  ?>"></script>
        <script type="text/javascript" src="<?= base_url("/assets/js/jquery-ui-1.10.4.custom.min.js");  ?>"></script>
        <script type="text/javascript" src="<?= base_url("/assets/js/select2.min.js");  ?>"></script>
        <script type="text/javascript" src="<?= base_url("/assets/js/bootstrap.min.js");  ?>"></script>

        <!-- icone -->
        <link rel="icon" type="image/png" href="<?= base_url("/assets/images/icones/favicon.bmp");  ?>" />
    </head>

  <body>

    <div class="header">
        <div class="container">
            <?php if (strcmp($menu, 'timeline') == 0): ?>
                <a class="menu active" href="<?= site_url("timeline/"); ?>"><span class="glyphicon glyphicon-home"></span> Accueil</a>
                <a class="menu" href="<?php echo site_url("profil/get/"); echo "/".$this->session->userdata('id'); ?>"><span class="glyphicon glyphicon-user"></span> Profil</a>
                <a class="menu" href="<?= site_url("leaderboard/"); ?>"><span class="glyphicon glyphicon-list-alt"></span> Leaderboard</a>    
            <?php elseif (strcmp($menu, 'profil') == 0): ?>
                <a class="menu" href="<?= site_url("timeline/"); ?>"><span class="glyphicon glyphicon-home"></span> Accueil</a>
                <a class="menu active" href="<?php echo site_url("profil/get/"); echo "/".$this->session->userdata('id'); ?>"><span class="glyphicon glyphicon-user"></span> Profil</a>
                <a class="menu" href="<?= site_url("leaderboard/"); ?>"><span class="glyphicon glyphicon-list-alt"></span> Leaderboard</a>    
            <?php else: ?>
                <a class="menu" href="<?= site_url("timeline/"); ?>"><span class="glyphicon glyphicon-home"></span> Accueil</a>
                <a class="menu" href="<?php echo site_url("profil/get/"); echo "/".$this->session->userdata('id'); ?>"><span class="glyphicon glyphicon-user"></span> Profil</a>
                <a class="menu active" href="<?= site_url("leaderboard/"); ?>"><span class="glyphicon glyphicon-list-alt"></span> Leaderboard</a>
            <?php endif ?>
            <a class="menu pull-right" href="<?= site_url("login/logout"); ?>"><span class="glyphicon glyphicon-off"></span> Déconnexion</a>
            <a class="menu pull-right" class="btn btn-primary btn-lg" href="<?= site_url("profil/config"); ?>"> <span class="glyphicon glyphicon-cog"></span></a>
        </div>
    </div>