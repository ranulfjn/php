<?php

$Candidats = [
['Pierre', 22, '123 rue A', 'aa@ser.com', ['programming' => 5, 'teaching' => 2]],
['Julie', 65, '123 rue B', 'bb@ser.com', ['electronics' => 46]],
['Martin', 45, '123 rue C', 'cc@ser.com', ['programming' => 21, 'teaching' => 1]],
['Mélanie', 41, '123 rue D', 'dd@ser.com', ['welding' => 12, 'nutrition' => 6, 'restoration' => 1]],
];

// background black if age equal reference age, green when higher, blue when lower
const AGE_REFERENCE = 45;

// background yellow when years of experience higher or equal to MINIMUM_EXPERIENCE
const MINIMUM_EXPERIENCE = 5;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Exercice 4-3 - Job Candidates</title>

    <style>
        table,
        td,
        th {
            border: 1px solid black;
            margin: auto;
        }

        ul {
            list-style-type: none;
            padding: 5px;
        }

        /* when egal age reference*/
        .age-reference {
            background-color: black;
            color: white;
        }

        /* when > age reference*/
        .age-over {
            background-color: green;
            color: white;
        }

        /* when < age reference */
        .age-under {
            background-color: blue;
            color: white;
        }

        /* when  < minimum experience */
        .experience-invalid {
            background-color: white;
            color: black;
        }

        /* when >= minimum experience */
        .experience-valid {
            background-color: yellow;
            color: black;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Email</th>
                <th>Experiences</th>
            </tr>
        </thead>


        <?php

            $class = 'ul';
            $sub_class = '';
                foreach ($Candidats as $job) {
                    if ($job[1] == AGE_REFERENCE) {
                        $class = 'age-reference';
                    } elseif ($job[1] > AGE_REFERENCE) {
                        $class = 'age-over';
                    } elseif ($job[1] < AGE_REFERENCE) {
                        $class = 'age-under';
                    }
                    echo'<tr class='.$class.'>';
                    echo'<td class='.$class.'>'.$job[0].'</td>';
                    echo'<td class='.$class.'>'.$job[1].'</td>';
                    echo'<td class='.$class.'>'.$job[2].'</td>';
                    echo'<td class='.$class.'>'.$job[3].'</td>';
                    echo '<td class='.$class.'>';

                    foreach ($job[4] as $key => $value) {
                        if ($value < MINIMUM_EXPERIENCE) {
                            $sub_class = 'experience-invalid';
                        } else {
                            $sub_class = 'experience-valid';
                        }
                        echo '<div class='.$sub_class.'>'.$key.'='.$value.'</div>';
                    }
                    echo'</td>';
                }

                echo'</tr>';

                function a($Candidats)
                {
                    $sum = 0;
                    foreach ($Candidats as $job) {
                        $sum += $job[1];
                    }

                    return $sum;
                }

                echo'<tr>';
                $avg = a($Candidats) / count($Candidats);
                echo'<td> Average</td>';
                echo'<td>'.$avg.'</td>';
                echo'<td colspan="3"> </td>';
                echo'</tr>';
        ?>

    </table>
</body>

</html>