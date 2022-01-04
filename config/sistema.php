<?php

return [

    'td' => env('SYS_TD', 0),
    'ip' => env('SYS_IP', '127.0.0.1'),
    'hash' => env('SYS_HASH', NULL),
    'synctime' => env('SYS_SYNC_TIME', 5),
    'login' => env('SYS_LOGIN', true), // true es iconos false es form
    'justdata' => env('SYS_JUST_DATA', false), // si se encuentra true es por que solo mostrara datos
    'print' => env('PRINT', true), // si no print esta falso
];
