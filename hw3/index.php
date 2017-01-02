<?php

require_once('hw3lib.php');

include_once('config.php');
include_once($templates . 'header.html');

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

echo get_menu($nav);

echo '<main class=content>';

echo '<h3>Task 1</h3>';
show_divisibale_by_3();

echo '<h3>Task 2</h3>';
show_evens_and_odd();

echo '<h3>Task 3</h3>';
show_cities($regions, 'К');

echo '<h3>Task 4</h3>';
without_body();

echo '<h3>Task 5</h3>';
$text = 'Тигры в клетке!';
echo $text . ' ==> ' . text2url($text, $cyrillic_to_latin_map);

echo '</main>';
include_once($templates . 'footer.html');

?>
