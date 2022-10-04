<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Cogip Enterprise</title>
    <link rel="stylesheet" href="style/style.css">
    <script defer src="js/main.js"></script>
</head>
<body>
     <!-- Menu -->
     <?php require ('../Resources/views/partials/headerCTA.php');?>
    <!-- End Menu -->
    <main>
        <!-- Content -->
        <?php require ('../Resources/views/partials/tableFunction.php');?>
        <?php
            echo insertTable($data['invoices'], "invoice");
            echo insertTable($data['companies'], "companies");
            echo insertTable($data['contacts'], "contacts");
        ?>
        <!-- End Content -->
    </main>
     <?php require ('../Resources/views/partials/cta.php');?>
     <?php require ('../Resources/views/partials/footer.php');?>
</body>
</html>