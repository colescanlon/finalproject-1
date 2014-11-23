<table class="table table-striped">

    <thead>
        <tr>
            <td><b>Date/Time</b></td>
            <td><b>Symbol</b></td>
            <td><b>Shares</b></td>
            <td><b>Price</b></td>
            <td><b>Type</b></td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($history as $row): ?>
            <tr>
                <td><?= date('Y-m-d H:i:s', strtotime($row["time"])) ?></td>
                <td><?= $row["symbol"] ?></td>
                <td><?= $row["shares"] ?></td>
                <td><?= number_format($row["price"], 2) ?></td>
                <td><?= $row["type"] ?></td>
                
            </tr>
        <?php endforeach ?>
    </tbody>   
</table>

<ul class="nav center-pills">
    <li><a href="history_clear.php">Clear History</a>
</li>
