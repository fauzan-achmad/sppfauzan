<?php

global $connection;


$year = htmlspecialchars($_POST['year'] ?? null);
$nominal = htmlspecialchars($_POST['nominal'] ?? null);
$nominal = (int) str_replace(',', '', $nominal);

if ($year == "") {
    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Tahun Tidak Terisi.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/spps/create');
    die();
}

$checkspp = $connection->execute_query("SELECT * FROM spps WHERE year = ? LIMIT 1", [$year])->fetch_assoc();

if ($checkspp) {

    $_SESSION['FLASH_MESSAGE']['error'] = [
        'value' => 'Data Spp telah terdaftar.',
        'called' => false,
    ];

    header('Location: ' . env('APP_URL') . '/spps/create');
    die();
}

$query = $connection->execute_query("INSERT INTO spps (year,nominal) VALUES (
    ?, ?
)", [$year, $nominal]);





$_SESSION['FLASH_MESSAGE']['success'] = [
    'value' => 'Berhasil menambahkan Spp.',
    'called' => false,
];

header('Location: ' . env('APP_URL') . '/spps');
die();
