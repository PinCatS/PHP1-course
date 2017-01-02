<?php

/*

    Support functions for Homework 2.

    Todo:

        1. Refactoring.
        2. Decide whether array tables will reside in the functions
        here they are used or as a constant global one in lib namespace
        3. Fix several bugs
        4. More testing for incorrect input type values, boundary values.
*/

/*
    Calculates sum, multiplication or subtraction depending
    on input arguments.

    a and b >= 0 ==> -
    a and b < 0 ==> *
    otherwise ==> +

    if $return is true, return operation result as a string,
    otherwise display the result on console (default)  

*/
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


/*
    Prints the range from lower boundary
    to the upper one (hardcoded 15).

    if input low boundary will be > 15
    prints -1 (minus one);
*/
define('MAX_UPPER_VALUE', 15);

function rand_start_range($low) {
    if ($low > MAX_UPPER_VALUE)
        echo '-1';

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

/*
    Calculator:
        upported operations: +, -, *, /

    if divisor is 0, print error message and
    return 0;

    Note: uses helper functions: sum(), sub(), mult(), div();
            div() returns null if divisor is 0;
*/
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
                echo "Error: division by zero";
                return 0;
            }
            return div($arg1, $arg2);
        default:
            echo "Error: Unknown operation '$operation'";
            return 0;
    }
}

/*
    Calculates power of value.

    Supports negative values.
*/
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


/*
    Transliterates an input text depending on
    input transliterate table.

    Note: mbstring extension should be installed and
    enabled for PHP on the server.

*/
function transliterate($text, &$map) {
    
    $text = mb_strtoupper($text);
    $result = '';

    for ($i = 0; $i < 6; ++$i)
        $result .= $map[ mb_substr($text, $i, 1) ];

    return $result;
}

/*
    Depending on value and type, prints time unit
    with correct conjugation.

    TODO: might be time_units_from will be more
            suitable func name.
*/
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

/* 

    Returns value's word representation.
    Values till 1000 only supported in initial version.

    Todo:
        Fix a bug in tens at specific value.
        Add support > 999
        Cleaner code
*/
function number_to_word($val) {

    if ($val > 999) {
        echo 'Warning: values till 1000 only supported in initial version.';
        $val %= 100; // for now only process starting from hundreds
    }

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
        if (strlen($res) != 0)
            $res .= ' ';
        if (floor($val / 10) == 1) {
            $res .= $tens[ $val % 10 - 1 ];
            return $res;
        }
        else
            $res .= $tens2[ floor($val / 10) - 1 ];
    }

    $val %= 10;
    if ($val != 0) {
        if (strlen($res) != 0)
            $res .= ' ';
        $res .= $ones[ $val ];
    }

    return $res;
}


/*
    returns the date string in words representation (almost)
    depending on timezone specified.

    Todo:
        Fix conjugation bug for 'one' and 'two'
        Cleaner code 
*/
function get_date_in_russian( $timezone_identifier ) {
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

    date_default_timezone_set($timezone_identifier);
    $time = localtime(time(), true);

    $date = '';
    $date .= $time[ 'tm_mday' ] . ' ' . $month[ $time['tm_mon'] ][1] . ' ' . date('Y') . '.';
    $date .= ' ' . $week[ $time['tm_wday'] ] . '.';
    $date .= ' Время: ' . number_to_word($time[ 'tm_hour' ]) . ' ' . time_units_to_words($time[ 'tm_hour' ]) . ' ' . number_to_word($time[ 'tm_min' ]) . ' ' . time_units_to_words($time[ 'tm_min' ], 'M') . ' ' . number_to_word($time[ 'tm_sec' ]) . ' ' . time_units_to_words($time[ 'tm_sec' ], 'S');

    return $date;
}
?>