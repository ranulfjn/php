<?php

const HOME = 'Welcome';
const PRODUCT = 'Product Catalogue';
const ABOUT = 'About Us';
const IDEA = 'Gift Ideas';

// the selected item
$selected = ABOUT;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Exercice 3-2 variable attribut</title>
    <style>
        #navigation ul {
            width: 150px;
        }

        .menu-item {
            background-color: #e1f4f3;
            color: #0000cc;
            /* text-decoration: underline; */
        }

        .selected {
            background-color: #fea799;
        }
    </style>
</head>

<body>
    <h1>Display active item in menu</h1>
    <nav id="navigation">

        <ul>
            <?php
            echo'<li class="menu-item"> <a href="#">'.HOME.'</a></li>';
            echo'<li class="menu-item"><a href="#">'.PRODUCT.'</a></li>';
            echo'<li class="selected"><a href="#">'.ABOUT.'</a></li>';
            echo'<li class="menu-item"><a href="#">'.IDEA.'</a></li>';
           ?>
        </ul>
    </nav>
</body>

</html>