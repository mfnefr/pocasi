<h1>Naměřené údaje pro stanici: <?= $Stations_ID ?></h1>
<table>
    <thead>
        <tr>
            <th>Srážky</th>
            <th>Vlhkost</th>
            <th>Maximální rychlost větru</th>
            <th>Datum a čas</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['precipitation'] ?> mm</td>
            <td><?= $row['humidity'] ?> %</td>
            <td><?= $row['max_wind'] ?> m/s</td>
            <td><?= $row['date'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="strankovane">
    <a href="<?= site_url('strankovaneData/' . $Stations_ID . '/' . ($page - 1)) ?>">Previous</a>
    <a href="<?= site_url('strankovaneData/' . $Stations_ID . '/' . ($page + 1)) ?>">Next</a>
</div>