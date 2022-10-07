<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['name']; ?> | Cogip Enterprise</title>
    <link rel="stylesheet" href="/style/style.css">
    <script defer src="/js/main.js"></script>
</head>
<body>
     <!-- Menu -->
     <?php require ('../Resources/views/partials/header.php');?>
    <!-- End Menu -->
     <main>
        <!-- Content -->
         <?php
            require ('../Resources/views/partials/tableFunction.php');
            echo insertTable($data, $data['name']);
         ?>
    </main>
     <?php require ('../Resources/views/partials/footer.php');?>
</body>
</html>