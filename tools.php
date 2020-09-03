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

function array_HTML_Products($arrayName)
{
    $r = '';

    $r .= '<table class="tab" >';
    $r .= '<tr>';
    $r .= '<th>id </th>';
    $r .= '<th>name</th>';
    $r .= '<th>description</th>';
    $r .= '<th>price</th>';
    $r .= '<th>pic</th>';
    $r .= '<th>stock</th>';
    $r .= '</tr>';
    foreach ($arrayName as $key => $value) {
        $r .= '<tr>';
        $r .= '<td>'.$value['id'].'</td>';
        $r .= '<td>'.$value['name'].'</td>';
        $r .= '<td>'.$value['description'].'</td>';
        $r .= '<td>'.$value['price'].'</td>';
        $r .= '<td>'.$value['pic'].'</td>';
        $r .= '<td>'.$value['qty_in_stock'].'</td>';
        $r .= '</tr>';
    }
    $r .= '</table>';

    return $r;
}
