<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Cogip</title>
    <link rel="stylesheet" href="style/style.css">
    <script defer src="js/main.js"></script>
</head>
<body>
     <!-- Menu -->
     <?php require ('../Resources/views/partials/header.php');?>
    <!-- End Menu -->
     <pre>
    <?php print_r($data)?>
</pre>
    <main>
        <!-- Content -->
<!--        This is the data you will need to add pagination, it show the number of row in the database -->
<!--        <pre>-->
<!--            --><?php //print_r($data['rows'][0]) ?>
<!--        </pre>-->
        <div class="table__box">
            <h2 class="table__title"><?= $data['name']; ?></h2>
            <table class="table__main">
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
        </div>
    </main>
     <?php require ('../Resources/views/partials/footer.php');?>
</body>
</html>