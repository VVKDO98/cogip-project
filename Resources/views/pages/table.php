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
    <main>
        <!-- Content -->

        <div class="table__box">
            <h2 class="table__title">Last invoices</h2>
            <table class="table__main">
                <thead class="table__header">
                <tr class="table__left">
                    <th class="table__head">Invoice number</th>
                    <th class="table__head">Dates due</th>
                    <th class="table__head">Company</th>
                    <th class="table__head">Created at</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $item) { ?>
                    <tr class="table__row table__left">
                        <?php foreach($item as $key => $value) {?>
                        <td class="table__content"><?= $value ?></td>
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