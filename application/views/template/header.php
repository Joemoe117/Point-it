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

        <!-- Javascript -->
        <script type="text/javascript" src="<?= base_url("/assets/js/jquery-2.1.0.min.js");  ?>"></script>
        <script type="text/javascript" src="<?= base_url("/assets/js/jquery-ui-1.10.4.custom.min.js");  ?>"></script>
        <script type="text/javascript" src="<?= base_url("/assets/js/select2.min.js");  ?>"></script>
        <script type="text/javascript" src="<?= base_url("/assets/js/bootstrap.min.js");  ?>"></script>

        <!-- icone -->
        <link rel="icon" type="image/png" href="<?= base_url("/assets/images/icones/favicon.bmp");  ?>" />
    </head>

  <body>

    <header class="navbar navbar-static-top bs-docs-nav header">
        
        <div class="container">

            <div class="navbar-header">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../" class="navbar-brand"></a>
            </div>

            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

                <!-- navbar left -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= site_url("timeline/"); ?>">
                            <span class="glyphicon glyphicon-home <?php if (strcmp($menu, 'timeline') == 0) { echo "active";}?>" >
                                Accueil
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("profil/get/"); echo "/".$this->session->userdata('id'); ?>">
                            <span class="glyphicon glyphicon-user <?php if (strcmp($menu, 'profil') == 0) { echo "active";}?>">
                                Profil
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url("leaderboard/"); ?>">
                            <span class="glyphicon glyphicon-list-alt <?php if (strcmp($menu, 'leaderboard') == 0) { echo "active";}?>">
                                Leaderboard
                            </span> 
                        </a>
                    </li>
                </ul>
                <!-- end navbar left-->

                <!-- navbar right -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                          Ajouter un point
                        </button>
                    </li>
                    <li>
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
                    </li>
                </ul>
                <!-- end navbar right -->
            </nav>
        </div>
    </header>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Balance-lui quelquechose dans la gueule !</h4>
        </div>
        <form role="form" id="form_add_point" method="post" action="<?php echo site_url("timeline/add_point"); ?>">
        <div class="modal-body">
            
            <div class="control-group">
                <label for="multiple" class="control-label">Personne(s)</label>
                <div class="controls">
                    <select id="select_nom" class="select2" multiple name="personnes[]" style="width:100%;" minlengt="20" required>
                        <?php foreach ($form_profil as $value): ?>
                            <option value="<?=$value->profil_id?>"> <?=$value->profil_nom?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
            <label>Point</label>

            <!-- Génération de la dropdown des points -->
            <select class="form-control" name="point" required>
                <?php foreach ($form_point as $value): ?>
                    <option value="<?=$value->typept_id?>">Point <?=$value->typept_nom?> </option>
                <?php endforeach ?>
            </select>

            <label>Description</label>
            <textarea id="textarea" placeholder="Allez là !" class="form-control" name="texte_point" rows="3" cols="50"></textarea>
            </div>
            <?php if (isset($error) ): ?>
                <div id="alert_form_add" class="alert alert-danger"><?=$error?></div>
            <?php endif ?>

            <div class="checkbox">
                <label>
                    <input type="checkbox"> Epique
                </label>
            </div>
            <label>Date (facultatif)</label><br>
            <input id="date_point" type="text" name="date" placeholder="aaaa-mm-jj">
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary pull-right">Prends-ça !</button>
        </div>
        </form>    
    </div>
  </div>
</div>


    <!-- Javascript déguelasse -->
    <script type="text/javascript">
        $(function() {
            $("#select_nom").select2();
            $( "#date_point").datepicker({ dateFormat: "yy-mm-dd" });
        });
    </script>