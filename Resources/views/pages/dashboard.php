<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Cogip Enterprise</title>
    <link rel="stylesheet" href="/style/dashboard/dashboard.css">
    <script defer src="/public/js/main.js"></script>
</head>
<body>
    <main>
        <article class="dash__menu">
            <div class="dash__header">
                <img src="/assets/img/ben.jpg" alt="profile picture" class="dash__imgprofile">
                <p class="dash__name"><?= $_SESSION['user']['name'].' '.$_SESSION['user']['last'] ?></p>
            </div>
            <hr>
            <div class="dash__nav">
                <ul class="dash__nav__item">
                    <li><img src="/assets/img/Icon_dashboard.png" alt=""><a href="/dashboard" class="dash__nav__link">Dashboard</a></li>
                    <li><img src="/assets/img/Icon_Invoices.png" alt=""><a href="/dashboard/addinvoice" class="dash__nav__link">Invoices</a></li>
                    <li><img src="/assets/img/Icon_Companies.png" alt=""><a href="/dashboard/addcompany" class="dash__nav__link">Companies</a></li>
                    <li><img src="/assets/img/Icon_contact.png" alt=""><a href="/dashboard/addcontact" class="dash__nav__link">Contacts</a></li>
                </ul>
            </div>
            <div class="dash__logout">
                <hr>
                <div class="dash__logout__content">
                    <img src="/assets/img/ben.jpg" alt="" class="dash__imglogout">
                    <a href="/" class="dash__nav__logout">Logout</a>
                </div>
            </div>
        </article>
        <div class="dash__main">
            <article class="dash__banner">
                <div class="dash__banner__top">
                    <h1 class="dash__banner__title">Dashboard</h1>
                    <ul class="dash__banner_breadcrumb">
                        <li><a href="#" class="dash__banner__link">dashboard/</a></li>
                        <!--                    <li><a href="#" class="dash__banner__link">invoices/</a></li>-->
                        <!--                    <li><a href="#" class="dash__banner__link">companies/</a></li>-->
                        <!--                    <li><a href="#" class="dash__banner__link">contacts</a></li>-->
                    </ul>
                </div>
                <div class="dash__banner__bottom">
                    <div class="dash__banner__content">
                        <h2>Welcome back Benoit !</h2>
                        <p>You can here add an invoice, a company, and some contacts</p>
                    </div>
                    <img src="/assets/img/imgbanner.png" alt="">
                </div>
            </article>
            <?php
            if(isset( $data['page'])) {
                include "../Resources/views/partials/tableFunction.php";
                include "../Resources/views/partials/" . $data['page'] . ".php";
            }
            ?>
        </div>

    </main>
</body>
</html>