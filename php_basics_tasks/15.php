<meta charset="utf-8">
<?php

switch($operator){
    case($operator =='+'):
        echo $a+$b;
        break;
    case($operator =='-'):
        echo $a-$b;
        break;
    case($operator =='*'):
        echo $a*$b;
        break;
    case($operator =='/'):
        if($b==0){
            echo 'ошибкa! На 0 делить нельзя!';
        }else{
            echo $a/$b;
        }
        break;
    case($operator =='%'):
        echo $a%$b;
        break;
    default:
        echo "Неизвестный оператор";
}

