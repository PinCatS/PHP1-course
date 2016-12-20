<?php
function funny_calculator($a, $b, $return = false) {

    if ( $a >= 0 && $b >= 0 )
        $result = $a - $b;
    elseif ( $a < 0 && $b < 0 )
        $result = $a * $b;       
    else
        $result = $a + $b;   

    if ( $return )
        return $result;

    echo $result;

}

/*funny_calculator(5, 6);
echo( "\n" . funny_calculator(5, 6, true) . "\n");

funny_calculator(0, 0);
funny_calculator(-2, -4);
funny_calculator(-2, 4);*/

/*echo "\n";*/

function rand_start_range($low) {
    switch($low) {
        case 0: echo '0 ';
        case 1: echo '1 ';
        case 2: echo '2 ';
        case 3: echo '3 ';
        case 4: echo '4 ';
        case 5: echo '5 ';
        case 6: echo '6 ';
        case 7: echo '7 ';
        case 8: echo '8 ';
        case 9: echo '9 ';
        case 10: echo '10 ';
        case 11: echo '11 ';
        case 12: echo '12 ';
        case 13: echo '13 ';
        case 14: echo '14 ';
        case 15: echo '15';
    }
}

/*rand_start_range( rand(0, 15) );*/



function sum($a, $b) {
    return $a + $b;
}

function sub($a, $b) {
    return $a - $b;
}

function mult($a, $b) {
    return $a * $b;
}

function div($a, $b) {
    
    if ($b == 0) return null;

    return $a / $b;

}

function calculator($arg1, $arg2, $operation) {
    switch($operation) {
        case '+':
            return sum($arg1, $arg2);
        case '-':
            return sub($arg1, $arg2);
        case '*':
            return mult($arg1, $arg2);
        case '/':
            if ($arg2 == 0) {
                echo "Error: division by zero.\n";
                return 0;
            }
            return div($arg1, $arg2);
        default:
            echo "Error: Unknown operation '$operation'\n";
            return 0;
    }
}

/*echo "\n";
echo(calculator(5, 2, '+'));
echo(calculator(5, 2, '-'));
echo(calculator(5, 2, '*'));
echo(calculator(5, 2, '/'));
echo(calculator(5, 0, '/'));
echo(calculator(5, 0, '**'));*/

function power($val, $pow) {
    if ($pow == 0)
        return 1;

    if ($pow == 1)
        return $val;

    if ($pow < 0) {
        $pow = -1 * $pow;
        $val = 1 / $val;
    }

    return $val * power($val, $pow - 1);
}

/*echo "\n" . power(2, 3) . "\n";*/

$cyrillic_to_latin_map = [
    "А" =>  "A",
    "Б" =>  "B",
    "В" =>  "V",
    "Г" =>  "G",
    "Д" =>  "D",
    "Е" =>  "E",
    "Е" =>  "E",
    "Ж" =>  "ZH",
    "З" =>  "Z",
    "И" =>  "I",
    "I" =>  "I",
    "Й" =>  "I",
    "К" =>  "K",
    "Л" =>  "L",
    "М" =>  "M",
    "Н" =>  "N",
    "О" =>  "O",
    "П" =>  "P",
    "Р" =>  "R",
    "С" =>  "S",
    "Т" =>  "T",
    "У" =>  "U",
    "Ф" =>  "F",
    "Х" =>  "KH",
    "Ц" =>  "TS",
    "Ч" =>  "CH",
    "Ш" =>  "SH",
    "Щ" =>  "SHCH",
    "Ы" =>  "Y",
    "Ъ" =>  "IE",
    "Э" =>  "E",
    "Ю" =>  "IU",
    "Я" =>  "IA"
];

function transliterate($text, &$map) {
    
    $text = mb_strtoupper($text);
    $result = '';

    for ($i = 0; $i < 6; ++$i)
        $result .= $map[ mb_substr($text, $i, 1) ];

    return $result;
}

$text = 'Сергей';
$res =  transliterate($text, $cyrillic_to_latin_map);
echo $text . ' ==> ' . $res;

function print_time( $timezone_identifier ) {

    date_default_timezone_set('Europe/Moscow');
    print_r(localtime(time(), true));

}

print_time('Europe/Moscow');

function time_units_to_words($val, $t = 'H') {

    $type = [
        'H'  => [ 'час', 'часа', 'часов'],
        'M'  => [ 'минута', 'минуты', 'минут'],
        'S'  => [ 'секунда', 'секунды', 'секунд'],
        'MS' => [ 'миллисекунда', 'миллисекунды', 'миллисекунд']
    ];

    if ($val < 0) $val *= -1; // if negative, convert to positive

    if ( $val % 10 == 1 && $val != 11 ) // if last digit is 1 except 11
        return $type[ $t ][ 0 ];
    elseif ( $val % 10 > 1 && $val % 10 < 5 && floor($val / 10) != 1) // if last digit is between 1 and 5, except all tens 
        return $type[ $t ][ 1 ];
    else
        return $type[ $t ][ 2 ];

}

$month = [
    [ 'Январь',  'Января'   ],
    [ 'Февраль', 'Февраля'  ],
    [ 'Март',    'Марта'    ],
    [ 'Апрель',  'Апреля'   ],
    [ 'Май',     'Мая'      ],
    [ 'Июнь',    'Июня'     ],
    [ 'Июль',    'Июля'     ],
    [ 'Август',  'Августа'  ],
    [ 'Сентябрь','Сентября' ],
    [ 'Октябрь', 'Октября'  ],
    [ 'Ноябрь',  'Ноября'   ],
    [ 'Декабрь', 'Декабря'  ],
];

$week = [
    'Понедельник',
    'Вторник',
    'Среда',
    'Четверг',
    'Пятница',
    'Субота',
    'Воскресенье',
];

function number_to_word($val) {
    $ones = [
        'ноль',
        'один',
        'два',
        'три',
        'четыре',
        'пять',
        'шесть',
        'семь',
        'восемь',
        'девять',
    ];

    $tens = [
        'десять',
        'одинадцать',
        'двенадцать',
        'тринадцать',
        'четырнадцать',
        'пятнадцать',
        'шестнадцать',
        'семнадцать',
        'восемнадцать',
        'девятнадцать',
    ];

    $tens2 = [
        'десять',
        'двадцать',
        'тридцать',
        'сорок',
        'пятьдесят',
        'шестьдесят',
        'восемдесят',
        'девяносто',
    ];

    $hundreds = [
        'сто',
        'двести',
        'триста',
        'четыреста',
        'пятьсот',
        'шестьсот',
        'семьсот',
        'восемьсот',
        'девятсот',
    ];

    $res = '';

    if ($val < 0)
        $res .= 'минус ';

    if (floor($val / 100) != 0)
        $res .= $hundreds[ floor($val / 100) - 1 ];

    $val %= 100;
    if (floor($val / 10) != 0) {
        if (floor($val / 10) == 1) {
            $res .= $tens[ $val % 10 - 1 ];
            return $res;
        }
        else
            $res .= $tens2[ floor($val / 10) - 1 ];
    }

    $val %= 10;
    if ($val != 0) {
        $res .= $ones[ $val ];
    }

    return $res;
}


for ($i = 0; $i < 40; ++$i) echo "\n" . $i . time_units_to_words($i, 'M') . "\n";

for ($i = 99; $i < 125; ++$i) echo "\n" . number_to_word($i) . "\n";

?>