<?=  $this->extend('layout/sablona'); ?>
<?= $this->section('obsah'); ?>
<h1 class="text-light my-5 text-center">Naměřené údaje pro stanici: <br> <?= $stanice->place ?></h1>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success text-center">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<div class="d-flex justify-content-center mb-4">
    <form action="<?= base_url('stanice/smazat-data/' . $stanice->S_ID) ?>" method="post" class="d-flex align-items-center">
        <label for="month_year" class="text-light me-2">Smazat data za:</label>
        <input type="month" name="month_year" id="month_year" class="form-control w-auto me-2" required>
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>

<?php
    use PhpParser\Node\Stmt\Foreach_;
    use App\Models\Bundesland;
    use App\Models\Data;

                $table = new \CodeIgniter\View\Table();

                $table->setHeading('Srážky', 'Vlhkost', 'Maximální rychlost větru', 'Datum');

                $template = array(
                    'table_open'=> '<table class="table table-bordered">',
                    'thead_open'=> '<thead>',
                    'thead_close'=> '</thead>',
                    'heading_row_start'=> '<tr>',
                    'heading_row_end'=>' </tr>',
                    'heading_cell_start'=> '<th class="text-center">',
                    'heading_cell_end' => '</th>',
                    'tbody_open' => '<tbody>',
                    'tbody_close' => '</tbody>',
                    'row_start' => '<tr>',
                    'row_end'  => '</tr>',
                    'cell_start' => '<td class="text-center">',
                    'cell_end' => '</td>',
                    'row_alt_start' => '<tr>',
                    'row_alt_end' => '</tr>',
                    'cell_alt_start' => '<td class="text-center">',
                    'cell_alt_end' => '</td>',
                    'table_close' => '</table>'
                    );
                    $table->setTemplate($template);
                        foreach($records as $row) {
                            $table->addRow($row->precipitation, $row->humidity, $row->max_wind, $row->date);
                        }
                        echo $table->generate(); ?>
                    <div class="pagination justify-content-center">
                            <?= $pager->links(); ?>
                    </div>
<?=$this->endSection(); ?>