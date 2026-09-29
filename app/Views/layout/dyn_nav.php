<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $this->include('layout/css'); ?>
    <?= $this->include('layout/js'); ?>
</head>
<body class="bg-primary">
<nav class="navbar navbar-expand-lg bg-info" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('/') ?>"> Hlavní stránka </a>
                    </li>
                <?php foreach($okresy as $row): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('obce/'.$row->kod) ?>"> <?= $row->nazev ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
          </div>
        </div>
</nav>
<?= $this->renderSection('obsah'); ?>