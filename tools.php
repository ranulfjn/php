<?php

if (!isset($index_loaded)) {
    die('Direct Access to file is forbidden');
}
//display array in a table to screen

function arrayDisplay($arrayName)
{
    echo'<style> td,th{
        border:1px solid black;}</style>';
    echo'<table >';
    echo'<tr>';
    echo'<th>Key </th>';
    echo'<th>Value</th>'.'<br>';
    echo'</tr>';
    foreach ($arrayName as $key => $value) {
        echo'<tr>';
        echo"<td>$key</td>";
        echo"<td>$value</td>";
        echo'</tr>';
    }
    echo'</table>';
}

function array_HTML_table($arrayName)
{
    $r = '';
    $r .= '<style> td,th{
        border:1px solid black;}</style>';
    $r .= '<table >';
    $r .= '<tr>';
    $r .= '<th>Key </th>';
    $r .= '<th>Value</th>'.'<br>';
    $r .= '</tr>';
    foreach ($arrayName as $key => $value) {
        $r .= '<tr>';
        $r .= "<td>$key</td>";
        $r .= "<td>$value</td>";
        $r .= '</tr>';
    }
    $r .= '</table>';

    return $r;
}

function tableDisplay($arrayProducts)// display any table
{
    $r = '';
    // $r .= '<style> td,th{
    //     border:1px solid black;}</style>';
    $r .= '<table class="tab" >';
    if (count($arrayProducts) == 0) {
        return 'table is empty';
    }
    $col_names = array_keys($arrayProducts[0]);
    $r .= '<tr>';
    foreach ($col_names as $col) {
        $r .= '<th>'.$col.'</th>';
    }
    $r .= '</tr>';
    foreach ($arrayProducts as $row) {
        $r .= '<tr>';
        foreach ($col_names as $col) {
            $r .= '<td>'.$row[$col].'</td>';
        }
        $r .= '</tr>';
    }
    $r .= '</table>';

    return $r;
}

function crash($code, $message)
{
    http_response_code($code);
    // mail(ADMIN_EMAIL, COMPANY_NAME.'Server crash code='.$code, $message);
    $file = fopen('logs/errors.log', 'a+');
    $time_info = date('d-M-Y H:i:s');
    fwrite($file, $message.' : '.$time_info.'<br>');
    fclose($file);
    die($message);
}
