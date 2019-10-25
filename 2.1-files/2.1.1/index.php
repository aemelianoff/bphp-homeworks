<?php
function сonversionCSVInJSON($fileName) {
    if(($openFile = fopen('data.csv', 'r')) !== false) {
        $data = fgetcsv($openFile);
        $keys = explode(';', $data[0]);

        $newData = [];
        while ($data = fgetcsv($openFile)) {
            $oneStrArr = explode(';', $data[0]);
            $oneStrObj = [];
            for ($itemKey = 0; $itemKey < count($keys); $itemKey++) {
                $oneStrObj[$keys[$itemKey]] = $oneStrArr[$itemKey];
            }
            $newData[] = $oneStrObj;
        }
        fclose($openFile);

        $jsonData = json_encode($newData, JSON_PRETTY_PRINT);

        $file = 'data.json';
        file_put_contents($file, $jsonData);
        echo 'finished';
    } else {
        echo "Error opening file $fileName";
    }
}

сonversionCSVInJSON('data.csv');