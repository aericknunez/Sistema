<?php

return [

    'td' => env('SYS_TD', 0),
    'ip' => env('SYS_IP', '127.0.0.1'),
    'hash' => env('SYS_HASH', NULL),
    'synctime' => env('SYS_SYNC_TIME', 5), // segundos entre cada poll de las pantallas de mesas
    'legacy_import_token' => env('LEGACY_IMPORT_TOKEN', NULL), // TEMPORAL: token de la importacion a connect (routes/legacy-import.php)
];
