<?php

    $summa = $rowNumber = 0;
      $textTable = '';

    define( 'LINE_TABLE', '______________________________________________<br>' . PHP_EOL);
    define( 'LINE_HEADS', '----------------------------------------------<br>' . PHP_EOL);
    const COL_LINE = '|  ';

    $tovar1 = '<a>   iPhone          </a>';
    $costTovar1 = 'sdsd' + 25500;
    $countTovar1 = 1;
    $available1   = false;

 //   $summa = 0; $costTovar*$countTovar;

    $tovar2 = '   fmModule         _';
    $costTovar2 = 1500;
    $countTovar2 = 10;
    $available2   = True;


    $tovar3 = '   packet          _';
    $costTovar3 = 15;
    $countTovar3 = 11;
    $available3   = True;

    for($i=0;$i<=4;$i++){

        switch($i){
            case(0):
                $textTable .= LINE_TABLE . COL_LINE . "#". COL_LINE . "Name". COL_LINE . " Цена ". COL_LINE . "Количество ". COL_LINE . "Сумма ". COL_LINE . "<br>" . PHP_EOL . LINE_HEADS;
                break;
            case(4):
                $textTable .= COL_LINE . "Общая сумма заказа = $summa";
                break;
            default:
                $textTable .= COL_LINE . $i. COL_LINE . ${'tovar'.$i} . COL_LINE . ${'costTovar'.$i} . COL_LINE . ${'countTovar'.$i} . COL_LINE . ${'costTovar'.$i}*${'countTovar'.$i} . COL_LINE . 'товар ' . (${'available'.$i}  ? ' готово к отгрузке' : 'ждем поставки - ok') . "<br>";
                $summa += ${'costTovar'.$i}*${'countTovar'.$i};
        }
        
    }

echo (print $textTable);
