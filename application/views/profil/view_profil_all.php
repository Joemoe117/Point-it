<div class="container" style="background: #f5f5f5">
    <h1>Liste des membres</h1>
    <?php foreach ($profils as $profil): ?>
        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
            <div class="thumbnail">
                <img src="<?= base_url($profil->profil_image) ?>" style="height: 150px !important;" >
                <div class="caption">
                    <h3><?= $profil->profil_nom ?></h3>
                    <a href="<?php echo site_url("profil/get/"); echo "/".$profil->profil_id; ?>" class="btn btn-primary">Voir le profil</a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>
