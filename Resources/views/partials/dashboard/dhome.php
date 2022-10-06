<div class='tableMainWrapper'>
    <div class='table__box'>
<?php
    foreach ($data["count"] as $key=> $item): ?>
        <p> <?= $key." ".$item["row"] ?></p>
<?php endforeach; ?>
    </div>
<?php
    echo insertTable($data["invoices"], "invoice");
    echo insertTable($data["companies"], "Company");
    echo insertTable($data["contacts"], "contact");
?>
</div>