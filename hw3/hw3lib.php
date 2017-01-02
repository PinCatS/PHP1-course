<?php

function show_divisibale_by_3() {
    
    $i = 0;
    while ($i < 100) {
        if ( $i % 3 == 0 && $i != 0) {
            echo $i . ' ';
        }
        $i++;
    }

}

function show_evens_and_odd() {
    
    $i = 0;
    do {
        
        if ( $i == 0 ) {
            echo $i . ' - это ноль<br>';
        } else if ($i % 2 == 0) {
            echo $i . ' - чётное число<br>';
        } else {
            echo $i . ' - нечетное число<br>';
        }

        $i++;

    } while ($i < 11);
}

function without_body() {
    for ($i = 0; $i < 10; print_r($i++ . ' ')){};
}


$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштад"]
];

function show_cities(&$regions, $filter) {

    foreach ($regions as $region => $cities) {
        echo $region . ":\n<br>&nbsp&nbsp&nbsp&nbsp\t\t";
        for ($i = 0; $i < count($cities); ++$i) {
            if ($filter == null || mb_substr($cities[$i], 0, 1) === $filter) {
                echo $cities[$i];
                if ($i != count($cities)-1) echo ', ';
            }           
        }
        echo "<br>\n";
    }

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
    "Я" =>  "IA",
];


/*
    Transliterates an input text depending on
    input transliterate table.

    if symbol doesn't have a mapping in a map, replace it by space symbol

    Note: mbstring extension should be installed and
    enabled for PHP on the server.

*/
function transliterate($text, &$map) {
    
    $text = mb_strtoupper($text);
    $result = '';

    for ($i = 0; $i < mb_strlen($text); ++$i) {
        
        $entry = mb_substr($text, $i, 1);
        $result .= ( isset($map[ $entry ]) ) ? $map[ $entry ] : ' ';

    }

    return $result;
}

function spaces2underscores($text) {

    $res = '';

    for ($i = 0; $i < strlen($text); ++$i) {
        $res .= ($text[ $i ] === ' ') ? '_' : $text[ $i ];
    }

    return $res;
}

function text2url($text, &$map) {
    return spaces2underscores( trim( transliterate($text, $map) ) );
}

/*
    Returns complete menu html structure.

    Input $nav is the forest of menu elements (trees) with, possibly, sub-menus.

    Example of $nav:

    $nav = [
        [
            'url'       => 'home.html',
            "text"      => 'Home',
        ],
        [
            'url'       => 'catalog.html',
            'text'      => 'Catalog',
            'subMenu'   => [
                [
                    'url'   => 'teas.html',
                    'text'  => 'Teas'
                ],
                
                [
                    'url'   => 'sweets.html',
                    'text'  => 'Sweets'
                ]
            ]
        ],
        [
            'url'       => 'contacts.html',
            'text'      => 'Contacts',
        ]
    ];
*/
function get_menu($nav) {
    $res = '<nav class="nav">' . "<ul class=\"menu\">\n";
    foreach ($nav as $m) {
        menu_traverse($m, $res);
    }

    return $res . "</ul>\n" . '<div style="clear: both"></div>' . '</nav>';
}

/*
    while pre-order traverse of the menu tree, the proc
    builds complete html structure  for menu element.
*/
function menu_traverse($menu, &$res) {

    if (isset($menu)) {
        $res .= '<li><a href="' . $menu[ 'url' ] . '">' . $menu[ 'text' ]. "</a>";
    }

    if (isset( $menu[ 'subMenu' ] ) && is_array( $menu[ 'subMenu' ] )) {
        $res .= "<ul class=\"submenu\">\n";
        foreach ($menu[ 'subMenu' ] as $sm) {
            menu_traverse($sm, $res);
        }
        $res .= "</ul>\n";
    }

    return $res . "</li>\n";
}

?>