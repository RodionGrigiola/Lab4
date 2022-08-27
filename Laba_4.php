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
    $values = $service->spreadsheets_values->get($spreadsheetId, $range);

    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Advertising</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <form action="addAdvertisement.php" method="POST">
            <label for="email">EMAIL</label>
            <input type="email" name="email" placeholder="email" required>
            <br>
            <label for="heading">HEADING</label>
            <input type="text" name="heading" placeholder="heading" required>
            <p>
                <textarea name="advertisement" cols="50" rows="10" required></textarea>
            </p>
            <select name="adCategory">
                <option>Cat1</option>
                <option>Cat2</option>
            </select>
            <br><br>
            <button type="submit">add</button>
        </form>
            <p>Список объявлений:</p>
            <table border="1">
                <?php
                foreach ($values as $row)
                {
                    foreach ($row as $column)
                    {
                        echo "<td>" , $column , "</td>";
                    }
                    echo "<tr>";
                }
                ?>
            </table>
        </body>
</html>