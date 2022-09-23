
<!--<pre>-->
<!--    --><?php //print_r($data)?>
<!--</pre>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Cogip</title>
    <link rel="stylesheet" href="/style/style.css">
    <script defer src="/js/main.js"></script>
</head>
<body>
<!-- Menu -->
<?php require ('../Resources/views/partials/header.php');?>
<!-- End Menu -->
<main>
    <!-- Content -->
    <h2><?= $data['companies'][0]->Name ?></h2>

    <div>
        <p><span>Name:</span> <?= $data['companies'][0]->Name ?></p>
        <p><span>TVA:</span> <?= $data['companies'][0]->TVA ?></p>
        <p><span>Country:</span> <?= $data['companies'][0]->Country ?></p>
        <p><span>Phone:</span> <?= $data['contacts'][0]->Phone ?></p>
    </div>

    <div>
        <h3>Contact persons</h3>
        <div class="contact">
            <p><?= $data['contacts'][0]->Name ?></p>
        </div>
    </div>

    <table class="table__main">
        <thead class="table__header">
        <tr class="table__left">
            <?php foreach ($data['invoices'][0] as $key => $value){ ?>
                <?php if($key != "id"){ ?>
                    <th class="table__head"><?= $key ?></th>
                <?php } ?>
            <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['invoices'] as $item) { ?>
            <tr class="table__row table__left" onclick="window.location.href='/company/<?php echo($item->id) ?>'">
                <?php foreach($item as $key => $value) {?>
                    <?php if($key != "id"){ ?>
                        <td class="table__content"><?= $value ?></td>
                    <?php } ?>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <!-- End Content -->
    <!-- Footer -->
    <?php require ('../Resources/views/partials/footer.php');?>
    <!-- End Footer -->
</main>
</body>
</html>