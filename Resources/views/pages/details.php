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
<!--     Content -->
    <h2><?= isset($data[0]->Contact)?$data[0]->Contact:$data[0]->Company; ?></h2>

    <?php foreach ($data[0] as $key => $value): ?>
        <?php if($key != 'id' && $key != 'company_id'){ ?>
        <p><?= $key." : ".$value?></p>
        <?php } ?>
    <?php endforeach; ?>

    <!-- End Content -->
    <!-- Footer -->
    <?php require ('../Resources/views/partials/footer.php');?>
    <!-- End Footer -->
</main>
</body>
</html>