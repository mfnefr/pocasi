<?= $this->extend('layout/sablona'); ?>
<?= $this->section('obsah'); ?>
<h1 class="text-light mt-5">Vitaj soudruhu</h1>
<p class="text-light mt-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae quia, accusantium culpa adipisci 
    asperiores odio molestias, similique neque est autem repellendus beatae dolorem, incidunt iste nulla animi. Iure, cum omnis.</p>
     
    <?php
    
    use PhpParser\Node\Stmt\Foreach_;
    use App\Models\Bundesland;

                $table = new \CodeIgniter\View\Table();

                $table->setHeading('Id', 'Název', 'Zkratka');

                $template = array(
                    'table_open'=> '<table class="table table-bordered">',
                    'thead_open'=> '<thead>',
                    'thead_close'=> '</thead>',
                    'heading_row_start'=> '<tr>',
                    'heading_row_end'=>' </tr>',
                    'heading_cell_start'=> '<th>',
                    'heading_cell_end' => '</th>',
                    'tbody_open' => '<tbody>',
                    'tbody_close' => '</tbody>',
                    'row_start' => '<tr>',
                    'row_end'  => '</tr>',
                    'cell_start' => '<td>',
                    'cell_end' => '</td>',
                    'row_alt_start' => '<tr>',
                    'row_alt_end' => '</tr>',
                    'cell_alt_start' => '<td>',
                    'cell_alt_end' => '</td>',
                    'table_close' => '</table>'
                    );
                    $table->setTemplate($template);
                        //foreach($bundesland as $row) {
                            //$table->addRow($row->id, $row->name, $row->short_name);
                        //}
                        echo $table->generate();
            ?>

<?=$this->endSection(); ?>