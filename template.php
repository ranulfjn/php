<!DOCTYPE html>
<html lang="<?=$this->lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->title; ?>
    </title>
    <meta name="description" content="<?=$this->description; ?>">
    <link rel="icon" href="<?=$this->icon; ?>" type=" image/jpeg">
    <link rel="stylesheet" href="maincss.css">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <!-- header -->
    <header>
        <div>
            <!--  link to home -->
            <a href="index.html">

                <div>
                    <img id="img1" src="logo.PNG" alt="Welcome to Manchester united Store"
                        title="Welcome to Utdstore.com">
                </div>

            </a>
            <H1>
                <?=COMPANY_NAME; ?>
            </H1>
        </div>
    </header>

    <!-- nav bar -->
    <nav>
        <ul class=nav>

            <li><a class="navdata" href="index.php">Home</a></li>
            <li><a class="navdata" href="index.php?op=110">Product List</a></li>
            <li><a class="navdata" href="index.php?op=111">Product Catalogue</a></li>
            <li><a class="navdata" href="index.php?op=3">Registration</a></li>
            <?php
            if (isset($_SESSION['level'])) {
                if ($_SESSION['level'] == 'employee') {
                    echo' <li><a class="navdata" href="index.php?op=50">Error Logs</a></li>';
                    echo' <li><a class="navdata" href="index.php?op=51">List Users</a></li>';
                }
            }
            if (isset($_SESSION['user_name'])) {
                echo"<li><a  href='index.php?op=5'>Logout</a></li>";
                echo'<li style="color:white;padding:10px; position:absolute;right:40px;text-transform: uppercase;">'.$_SESSION['user_name'].'<li>';
            } else {
                echo'  <li><a class="navdata" href="index.php?op=1">Login</a></li>';
            } ?>

        </ul>

    </nav>
    <main>
        <?= $this->content; ?>
    </main>
    <!-- Footer -->

    <footer>
        <div class="footer">
            <div class="container">
                <ul class="service">
                    <!-- address -->
                    <li> <strong>FIND US AT</strong> </li>
                    <li>26 Sir Matt Busby Way</li>
                    <li>Old Trafford</li>
                    <li>Stretford</li>
                    <li>Manchester M16 0RA</li>
                    <li>United Kingdom.</li>
                    <li> Phone: <?=COMPANY_PHONE; ?>
                    </li>
                    <li>Email:<?=COMPANY_EMAIL; ?>
                    </li>
                </ul>

            </div>

            <div class="container">
                <ul class="service">
                    <li>
                        <strong> Customer Service</strong>
                    </li>
                    <li>Help</li>
                    <li>Track Order</li>
                    <li>Size Chart</li>
                    <li>90-Day Returns</li>
                </ul>
            </div>
            <!-- Social media icons -->
            <div class="container">
                <ul class="social-media">
                    <li>
                        <strong> Follow Us</strong>
                    </li>
                    <li class="icons"><a href="https://www.facebook.com/manchesterunited" target="_blank"
                            class="fa fa-facebook" title="Facebook"></a>
                    </li>
                    <li class="icons"><a href="https://twitter.com/ManUtd" target="_blank" class="fa fa-twitter"
                            title="Twitter"></a>
                    </li>
                    <li class="icons"><a href="https://www.youtube.com/manutd" target="_blank" class="fa fa-youtube"
                            title="YouTube"></a></li>
                    <li class="icons"><a href="https://www.instagram.com/manchesterunited/" target="_blank"
                            class="fa fa-instagram" title="Instagram"></a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="footer-end"><strong>&copy; Copyright 2020 Fanatics (International) Ltd, Company No. 5933624 whose
                registered
                office is at
                Greengate, Middleton, Manchester, M24 1FD</strong>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>

</html>