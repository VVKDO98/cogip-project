<div class='tableMainWrapper'>
    <div class='table__box'>
<?php
    foreach ($data["count"] as $key=> $item): ?>
        <p> <?= $key." ".$item["row"] ?></p>
<?php endforeach; ?>
    </div>
<?php
    echo insertTable($data["invoices"], "Invoice");
    echo insertTable($data["companies"], "Company");
    echo insertTable($data["contacts"], "Contact");
?>
</div>