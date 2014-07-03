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
    </head>

  <body>

    <div class="header">
        <div class="container">
            <a class="menu active" href="<?= site_url("timeline/"); ?>"><span class="glyphicon glyphicon-home"></span> Accueil</a>
            <a class="menu" href="<?php echo site_url("profil/get/"); echo "/".$this->session->userdata('id'); ?>"><span class="glyphicon glyphicon-user"></span> Profil</a>
            <a class="menu" href=""><span class="glyphicon glyphicon-list-alt"></span> Leaderboard</a>
            <a class="menu pull-right" href="<?= site_url("login/logout"); ?>"><span class="glyphicon glyphicon-off"></span> Déconnexion</a>
            <a class="menu pull-right" class="btn btn-primary btn-lg" href="<?= site_url("profil/config"); ?>"> <span class="glyphicon glyphicon-cog"></span></a>
        </div>
    </div>





<!-- Modal -->
<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Paramètres</h4>
      </div>
      <div class="modal-body">
        <h5>Changer votre photo de profil</h5>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

        <h5>Changer votre mot de passe</h5>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary">Sauvegarder</button>
      </div>
    </div>
  </div>
</div> -->