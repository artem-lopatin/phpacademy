<style>
    body {
        font-family: "Courier";
    }
    table{
        border:1px solid black;
    }
    table thead td{
        text-align:center;
    }
    table tbody td:nth-child(n+3){
        text-align: right;
    }
</style>
<meta charset="UTF-8">
<div>Я Вас прив!</div>
<table>
<?php

    $summa = 0;
      $textTable = '';

    $products = array(
        array(
            'names' => '<a>   iPhone          </a>',
            'cost' => 25500,
            'count' => 1,
            'available' => false,
            'action' => 20,
        ),
        array(
            'names' => '   fmModule         _',
            'cost' => 1500,
            'count' => 2,
            'available' => true,
        ),
        array(
            'names' => '   packet          _',
            'cost' => 15,
            'count' => 11,
            'available' => true,
        ),
        array(
            'names' => '   bantly          _',
            'cost' => 150,
            'count' => 1,
            'available' => true,
            'action' => 100,
        ),
    );
?>
    <thead>

    <td>#</td><td>Name</td><td>Cost</td><td>Count</td><td>Sum</td><td>Avail</td><td>Sale</td>

    </thead>
    <tbody>
<?php
    const COL_LINE = '</td><td>';
    const BEGIN_ROW = '<tr><td>';
    const END_ROW = '</td><tr>';

for( $i = 0; $i < count($products); $i++)
{
    $textAvailable = 'товар ' . ($products[$i]['available'] ? ' готово к отгрузке' : 'ждем поставки - ok');

    $action = array_key_exists('action', $products[$i]) ? (100 - $products[$i]['action'])/100 : 1;

    $summaProduct = $products[$i]['cost']*$products[$i]['count'] * $action;

    $textTable .= BEGIN_ROW . ($i+1);

    foreach ($products[$i] as $key=>$value){
        switch ($key){
            case 'count':
                $textTable .= COL_LINE . $value . COL_LINE . $summaProduct;
                break;
            case 'available':
                $textTable .= COL_LINE . $textAvailable;
                break;
            default:
                $textTable .= COL_LINE . $value ;
        }

        //$a=$key;
    }

    $textTable .= END_ROW;

    $summa += $summaProduct;
}


$request = array_multisort($_REQUEST['cost'], SORT_ASC, SORT_NUMERIC, $_REQUEST['name'], $_REQUEST['action']);

for($i=0;$i<(count($_REQUEST['name']));$i++) {

    $textTable .= BEGIN_ROW . (count($products) + $i + 1) . COL_LINE;

    foreach ($_REQUEST as $key=>$value) {
        switch($key) {
            case'count':
                $textTable .= 1 . COL_LINE;
                break;
            case'sum':
                $textTable .= ($_REQUEST['cost'][$i]*(100 -$_REQUEST['action'][$i])/100) . COL_LINE;
                break;
            case'avail':
                $textTable .= 'товар готово к отгрузке' . COL_LINE;
                break;
            default:
                $textTable .= $value[$i]. COL_LINE;
        }
    }
    $summa += ($_REQUEST['cost'][$i]*(100 -$_REQUEST['action'][$i])/100);
}

$textTable .= BEGIN_ROW . '' . COL_LINE. "Общая сумма заказа" . COL_LINE . '' . COL_LINE. '' . COL_LINE . $summa . END_ROW;

echo $textTable;
?>
    </tbody>
</table>

<?php
//echo '<pre>';
//var_dump($_REQUEST);
//echo '</pre>';
