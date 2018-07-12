<?php
// Config - define some constants
define("EVENT_YEAR", 2018);
$event_year = EVENT_YEAR;
define("DATE_AU", "$event_year-11-03");
define("DATE_A100_DAY1", "$event_year-11-02");
define("DATE_A100_DAY2", DATE_AU);
define("DATE_A100_DAY3", "$event_year-11-04");
define("ENTRIES_FILE_AU", "entries_au_$event_year.csv");
define("ENTRIES_FILE_A100", "entries_a100_$event_year.csv");
define("MAX_ENTRIES_AU", 120);
define("MAX_ENTRIES_A100", 30);
define("EARLY_ENTRY_DATE", "October 1st, $event_year");
define("PRICE_A100", 180);
define("PRICE_A100_EARLY", 150);
define("PRICE_AU", 70);
define("PRICE_AU_EARLY", 50);
define("ENTRIES_OPEN_DATE", '2018-02-22');
define("ENTRIES_OPEN", (strtotime(ENTRIES_OPEN_DATE) < time() && strtotime(DATE_A100_DAY1) > time()));
define("MERCHANDISE", [
    'T-Shirt' => [
        'display_name' => 'T-Shirt',
        'price' => 25,
        'sizes' => [
            'S',
            'M',
            'L'
        ],
        'colours' => [
            'electric blue'
        ],
        'description' => 'Undulator T-shirt',
        'image' => "images/logos/t-shirt_black.png"
    ],
    'THIR-Undulator-headband' => [
        'display_name' => 'THIR Undulator headband',
        'price' => 30,
        'sizes' => NULL,
        'colours' => NULL,
        'description' => '<a href="http://www.thir.co.nz/thirbands.php">THIR multi-sport headband</a> with the Undulator logo'
    ],
    'THIR-BSR-headband' => [
        'display_name' => 'THIR BSR headband',
        'price' => 30,
        'sizes' => NULL,
        'colours' => NULL,
        'description' => '<a href="http://www.thir.co.nz/thirbands.php">THIR multi-sport headband</a> with the BSR (Big Sunday Run group) logo'
    ]
]);
