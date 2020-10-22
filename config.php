<?php
// Config - define some constants
define("EVENT_YEAR", 2020);
$event_year = EVENT_YEAR;
define("DATE_AU", "$event_year-11-07");
define("DATE_A100_DAY1", "$event_year-11-06");
define("DATE_A100_DAY2", DATE_AU);
define("DATE_A100_DAY3", "$event_year-11-08");
define("ENTRIES_FILE_AU", "entries_au_$event_year.csv");
define("ENTRIES_FILE_A100", "entries_a100_$event_year.csv");
define("MAX_ENTRIES_AU", 120);
define("MAX_ENTRIES_A100", 34);
define("EARLY_ENTRY_DATE", "October 1st, $event_year");
define("PRICE_A100", 180);
define("PRICE_A100_EARLY", 150);
define("PRICE_AU", 70);
define("PRICE_AU_EARLY", 50);
define("ENTRIES_OPEN_DATE", '2020-01-24');
define("ENTRIES_OPEN", (strtotime(ENTRIES_OPEN_DATE) < time() && strtotime(DATE_A100_DAY1) > time()));
define("MERCHANDISE", [
    'THIR-Undulator-headband' => [
        'display_name' => 'THIR Undulator headband',
        'price' => 30,
        'sizes' => NULL,
        'colours' => NULL,
        'description' => '<a href="http://www.thir.co.nz/thirbands.php">THIR multi-sport headband</a> with the Undulator logo',
        'image' => "images/logos/Undulator THIR.jpg"
    ],
    'T-Shirt' => [
        'display_name' => 'T-Shirt',
        'price' => 40,
        'sizes' => [
            'S',
            'M',
            'L'
        ],
        'colours' => [
            'copper'
        ],
        'description' => 'Undulator T-shirt',
        'image' => "images/logos/undulator_tshirt_copper.png"
    ],
    /*
    'THIR-BSR-headband' => [
        'display_name' => 'THIR BSR headband',
        'price' => 30,
        'sizes' => NULL,
        'colours' => NULL,
        'description' => '<a href="http://www.thir.co.nz/thirbands.php">THIR multi-sport headband</a> with the BSR (Big Sunday Run group) logo'
    ]
    */
]);
