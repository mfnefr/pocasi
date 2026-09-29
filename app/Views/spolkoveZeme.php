<?= $this->extend('layout/sablona'); ?>
<?= $this->section('obsah'); ?>
<div class="container">
    <h1 class="text-light mt-5 text-center"><?= $bundesland->name ?></h1>

    <div class="row text-center">
        <div class="col-md-6">
            <h3>Vlajka</h3>
                <img src="data:image/jpeg;base64,<?= base64_encode($bundesland->vlajka) ?>" alt="Vlajka <?= $bundesland->name ?>" class="img-fluid" style="max-height: 300px; max-width: 100%;">
        </div>
        <div class="col-md-6">
            <h3>Mapa</h3>
                <img src="data:image/jpeg;base64,<?= base64_encode($bundesland->mapa) ?>" alt="Mapa <?= $bundesland->name ?>" class="img-fluid" style="max-height: 300px; max-width: 100%;">
        </div>
    </div>
</div>
<?= $this->endSection() ?>