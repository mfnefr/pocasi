<?= $this->include('layout/dyn_nav'); ?>
<div class="container">
<div class="my-5">
<?php
$table = new \CodeIgniter\View\Table();

$table->setHeading('Pořadí', 'Název', 'Počet adresních míst');

$template = array(
    'table_open'=> '<table class="table table-bordered">',
    'thead_open'=> '<thead class="align-text-middle">',
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
        foreach($obce as $key => $row) {
            $poradi = $key + 1 + ($pager->getCurrentPage() - 1) * $limit;
            $table->addRow($poradi, $row->obec_nazev, $row->pocet_adresnich_mist);
        }
        echo $table->generate(); ?>
<div class="d-flex justify-content-center">
    <?php echo $pager->links(); ?>
</div>

<form method="get" action="<?php echo site_url('obce/' . $kod); ?>">
    <label class="text-light" for="limit">Počet položek na stránku:</label>
    <select name="limit" id="limit" onchange="this.form.submit()">
    <option value="20" <?php echo (isset($_GET['limit']) && $_GET['limit'] == 20) ? 'selected' : ''; ?>>20</option>
        <option value="35" <?php echo (isset($_GET['limit']) && $_GET['limit'] == 35) ? 'selected' : ''; ?>>35</option>
        <option value="50" <?php echo (isset($_GET['limit']) && $_GET['limit'] == 50) ? 'selected' : ''; ?>>50</option>
        <option value="100" <?php echo (isset($_GET['limit']) && $_GET['limit'] == 100) ? 'selected' : ''; ?>>100</option>
    </select>
</form>
</div>
</div>
