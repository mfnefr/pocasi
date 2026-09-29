<?= $this->extend('layout/sablona'); ?>
<?= $this->section('obsah'); ?>
<div class="my-5">
<?php
    
    use PhpParser\Node\Stmt\Foreach_;
    use App\Models\Bundesland;

                $table = new \CodeIgniter\View\Table();

                $table->setHeading('Název', 'Zkratka', 'Stránka');

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
                        foreach($bundeslands as $row) {
                            $odkaz = '<a href="' . site_url('stanice/' . $row->id) . '">' . $row->name . '</a>';
                            $odkazNaStranku = '<a href="' . site_url('spolkoveZeme/' . $row->id) . '">' . $row->stranka . '</a>';

                            $table->addRow($odkaz, $row->short_name, $odkazNaStranku);
                        }
                        echo $table->generate();
            ?>
</div>
<?=$this->endSection(); ?>