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
        <table>
            <thead>
            <tr>
                <th></th>
            </tr>
            </thead>
        <?php
            foreach ($data as $invoice):
            echo "<tr>
                    <td>$invoice[id]</td>
                    <td>$invoice[ref]</td>
                    <td>$invoice[created_at]</td>
                    <td>$invoice[name]</td>
                </tr>";
            endforeach;
        ?>
        </table>
        <!-- End Content -->

        <!-- Footer -->
        <?php require ('../Resources/views/partials/footer.php');?>
        <!-- End Footer -->
    </main>
</body>
</html>