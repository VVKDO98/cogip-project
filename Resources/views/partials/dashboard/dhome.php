<div class='tableMainWrapper'>
    <div class='table__box'>
        <div class="table__containNoti">
<?php
    foreach ($data["count"] as $key=> $item): ?>
        <div class="table__notification"><p> <?= $key." "."<br>".$item["row"] ?></p></div>
<?php endforeach; ?>
        </div>
    </div>
<?php
    echo insertTable($data["invoices"], "addinvoice");
    echo insertTable($data["companies"], "addcompany");
    echo insertTable($data["contacts"], "addcontact");
?>
</div>