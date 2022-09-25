<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['name']; ?> - Cogip</title>
    <link rel="stylesheet" href="/style/style.css">
    <script defer src="/js/main.js"></script>
</head>
<body>
<?php

switch ($data['name']){
    case "All contacts": $link = "contact"; break;
    case "All invoices": $link = "invoice"; break;
    case "All companies": $link = "company"; break;
}
?>
     <!-- Menu -->
     <?php require ('../Resources/views/partials/header.php');?>
    <!-- End Menu -->
     <main>
        <!-- Content -->
<!--        This is the data you will need to add pagination, it show the number of row in the database -->
<!--        <pre>-->
<!--            --><?php //print_r($data['rows'][0]) ?>
<!--        </pre>-->
        <div class="table__box">
            <h2 class="table__title" id="table"><?= $data['name']; ?></h2>
            <table class="table__main" >
                <thead class="table__header">
                <tr class="table__left">
                    <?php foreach ($data['datas'][0] as $key => $value){ ?>
                        <?php if($key != "id"){ ?>
                        <th class="table__head"><?= $key ?></th>
                        <?php } ?>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['datas'] as $item) { ?>
                    <tr class="table__row table__left" onclick="window.location.href='/<?php echo($link."/".$item->id) ?>'">
                        <?php foreach($item as $key => $value) {?>
                                <?php if($key != "id"){ ?>
                            <td class="table__content"><?= $value ?></td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php //pagination
                if($data['rows'][0]>10){
                $nbrPage = ceil($data['rows'][0]/10);
            ?>
            <nav id="pagination" >
                <?php if ($data['page']>1){ ?>
                <span id="pagination--prev"><a href="/<?php echo $link."s/".($data['page']-1)."#table" ?>"> Prev </a></span>
                <?php }
                for ($i = 1; $i <= $nbrPage; $i++) { ?>
                    <span id="page-<?= $i ?>" class="<?php if($i == $data['page']){echo "page-active";} ?>"><a href="/<?php echo $link."s/".$i."#table" ?>"><?=$i ?></a></span>
                <?php }
                if ($data['page']<$nbrPage){ ?>
                <span id="pagination--next"><a href="/<?php echo $link."s/".($data['page']+1)."#table" ?>"> Next </a></span>
                <?php } ?>
            </nav>
            <?php } ?>
        </div>
    </main>
     <?php require ('../Resources/views/partials/footer.php');?>
</body>
</html>