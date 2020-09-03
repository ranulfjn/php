<?php

function showTitle($title)
{
    echo "<br/><b>&#9830; $title</b><br/>";
    echo '<hr/>';
    $ex1 = explode(' ', SENTENCE);
    if ($title == 'Exercice 1') {
        for ($x = 0; $x < str_word_count(SENTENCE); ++$x) {
            echo $ex1[$x].'<br>';
        }
    }

    $ex2 = array_reverse($ex1);
    if ($title == 'Exercice 2') {
        for ($x = 0; $x < str_word_count(SENTENCE); ++$x) {
            echo $ex2[$x].'<br>';
        }
    }

    if ($title == 'Exercice 3') {
        echo'No of words:'.str_word_count(SENTENCE);
    }

    if ($title == 'Exercice 4') {
        echo'String length:'.strlen(SENTENCE);
    }
    if ($title == 'Exercice 5') {
        $count = strlen(SENTENCE) - substr_count(SENTENCE, ' ');
        echo'String length without space:'.$count;
    }

    if ($title == 'Exercice 6') {
        echo strtoupper(SENTENCE);
    }

    if ($title == 'Exercice 7') {
        echo ucfirst(SENTENCE);
    }

    if ($title == 'Exercice 8') {
        echo str_replace('e', 'f', SENTENCE);
    }
}

const SENTENCE = 'Une phrase qui doit être affiché en mettant un mot par ligne';

showTitle('Exercice 1');

showTitle('Exercice 2');

showTitle('Exercice 3');

showTitle('Exercice 4');

showTitle('Exercice 5');

showTitle('Exercice 6');

showTitle('Exercice 7');

showTitle('Exercice 8');
