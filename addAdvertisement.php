<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API Application');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAuthConfig(__DIR__ . '/credentials.json');
    $client->setAccessType('offline');
    $client->setPrompt('select_account consent');
    $service = new Google_Service_Sheets($client);
    $spreadsheetId = "l5eMaExwZU3gjzgPZ7B7DuWHqwMfir7WAr8p2GJNP4DY";
    $range = "Sheet1!A1:D";
    $values = [
        [$_POST["adCategory"], $_POST["name"], $_POST['email'], $_POST['advertisement']]
    ];
    $body = new Google_Service_Sheets_ValueRange(["values" => $values]);
    $params = [
        'valueInputOption' => 'RAW',
    ];
    $insert = [
        "insertDataOption" => "INSERT_ROWS"
    ];
    $service->spreadsheets_values->append(
        $spreadsheetId,
        $range,
        $body,
        $params
    ); 
header("Location: Laba_4.php");