<?= $this->extend('layout/sablona'); ?>
<?= $this->section('obsah'); 
    use App\Models\Bundesland;
?>
<h1 class="text-light my-5 text-center">Přehled meteorologických stanic ve spolkové zemi: <br><?= $bundeslandZeme->name ?></h1>

<div class="stanice">
    <div class="row">
    <?php foreach ($stanice as $stanica): ?>
        <?php   
        $bundeslandModel = new Bundesland();
        $vlajka = $bundeslandModel->getVlajka($stanica->bundesland); 
        $flag_base64 = isset($vlajka->vlajka) ? base64_encode($vlajka->vlajka) : null;
        ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title text-center mb-3"><a class="text-decoration-none" href="<?= site_url('staniceDetaily/' . $stanica->S_ID) ?>"><?= $stanica->place ?></a></h5>
                <p class="card-text">
                    <div class="mb-3">
                    Zeměpisná šířka: <?= $stanica->geo_latitude ?><br>
                    Délka: <?= $stanica->geo_longtitude ?><br>
                    Nadmořská výška: <?= $stanica->height ?> m 
                    </div>
                    <img src="data:image/jpeg;base64,<?= $flag_base64 ?>" alt="Vlajka <?= $stanica->bundesland ?>" class="img-fluid">
                </p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</div>
<?=$this->endSection(); ?>
