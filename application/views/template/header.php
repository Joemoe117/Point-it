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

        <!-- CSS -->
        <link href=" <?= base_url("/assets/css/bootstrap.min.css");  ?>    " rel="stylesheet">
        <link href=" <?= base_url("/assets/css/jquery-ui.min.css");  ?>    " rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="http://ivaynberg.github.io/select2/select2-3.4.1/select2.css"/>
        <link href=" <?= base_url("/assets/css/jquery-ui.structure.min.css");  ?>    " rel="stylesheet">
        <link href=" <?= base_url("/assets/css/jquery-ui.theme.min.css");  ?>    " rel="stylesheet">
        <link href=" <?= base_url("/assets/css/style.css");  ?>    " rel="stylesheet">


        <!-- FONT -->
        <link href='http://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet' type='text/css'>


        <!-- Javascript -->
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
            <!-- menu timeline actif -->
            <?php if (strcmp($menu, 'timeline') == 0): ?>
                <a class="menu active" href="<?= site_url("timeline/"); ?>"><span class="glyphicon glyphicon-home"></span> <span class="hidden-xs"> Accueil</span></span></a>
                <a class="menu" href="<?php echo site_url("profil/get/"); echo "/".$this->session->userdata('id'); ?>"><span class="glyphicon glyphicon-user"></span>  <span class="hidden-xs"> Profil</span></a>
                <a class="menu" href="<?= site_url("leaderboard/"); ?>"><span class="glyphicon glyphicon-list-alt"></span>  <span class="hidden-xs"> Leaderborard</span></a>    
            <!-- menu profil actif -->
            <?php elseif (strcmp($menu, 'profil') == 0): ?>
                <a class="menu" href="<?= site_url("timeline/"); ?>"><span class="glyphicon glyphicon-home"></span> <span class="hidden-xs"> Accueil</span></a>
                <a class="menu active" href="<?php echo site_url("profil/get/"); echo "/".$this->session->userdata('id'); ?>"><span class="glyphicon glyphicon-user"></span> <span class="hidden-xs"> Profil</span></a>
                <a class="menu" href="<?= site_url("leaderboard/"); ?>"><span class="glyphicon glyphicon-list-alt"></span>  <span class="hidden-xs"> Leaderborard</span></a>    
            <!-- menu leaderboard actif -->
            <?php else: ?>
                <a class="menu" href="<?= site_url("timeline/"); ?>"><span class="glyphicon glyphicon-home"></span> <span class="hidden-xs"> Accueil</span></a>
                <a class="menu" href="<?php echo site_url("profil/get/"); echo "/".$this->session->userdata('id'); ?>"><span class="glyphicon glyphicon-user"></span> <span class="hidden-xs"> Profil</span></a>
                <a class="menu active" href="<?= site_url("leaderboard/"); ?>"><span class="glyphicon glyphicon-list-alt"></span>  <span class="hidden-xs"> Leaderborard</span></a>
            <?php endif ?>

            <!-- Menu de configuration -->
            <span class="pull-right">
                <div class="dropdown">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-cog dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a href="<?= site_url("profil/config"); ?>"  role="menuitem" tabindex="-1" href="#">Configuration</a></li>
                        <li role="presentation"><a href="<?= site_url("login/logout"); ?>" role="menuitem" tabindex="-1" href="#">Déconnexion</a></li>
                    </ul>
                </div>
            </span>
        </div>
    </div>