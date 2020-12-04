<?php

$link = mysqli_connect(
    'db',
    'dev',
    'dev',
    'project',
    3306
);

if (!$link) {
    echo 'Fehler: konnte nicht mit MySQL verbinden.'.PHP_EOL;
    echo 'Debug-Fehlernummer: '.mysqli_connect_errno().PHP_EOL;
    echo 'Debug-Fehlermeldung: '.mysqli_connect_error().PHP_EOL;
    exit;
}

echo 'Die Verbindung mit der Datenbank wurde erfolgreich hergestellt!'.'<br>';
echo 'Host-Informationen: '.mysqli_get_host_info($link);

mysqli_close($link);
