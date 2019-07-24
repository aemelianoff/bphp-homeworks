<?php
class JsonFileAccessModel {
    protected $fileName;
    protected $file;

    public function __construct($name) {
        $this->$fileName = Config::DATABASE_PATH . $name . '.json';
    }

    private function connect() {
        $this->$file = fopen($this->$fileName, 'r+') or die("не удалось открыть файл");
    }

    private function disconnect() {
        fclose($this->$file);
    }

    public function read() {
        $file = fopen($this->$fileName, 'r+') or die("не удалось открыть файл");
        $readFile = file_get_contents($file);
        fclose($this->$file);
        return $readFile;
    }

    public function write($textToWrite) {
        $file = fopen($this->$fileName, 'w+') or die("не удалось открыть файл");
        fwrite($file, $textToWrite);
        fclose($this->$file);
    }

    public function readJson() {
        $file = fopen($this->$fileName, 'r+') or die("не удалось открыть файл");
        $readFile = file_get_contents($file);
        $jsonData = json_encode($readFile, JSON_PRETTY_PRINT);
        $newJsonData = file_put_contents($file, $jsonData);
        fclose($this->$file);
        return $newJsonData;
    }

    public function writeJson($textToWrite) {
        $file = fopen($this->$fileName, 'w+') or die("не удалось открыть файл");
        $jsonData = json_encode($textToWrite, JSON_PRETTY_PRINT);
        fwrite($file, $jsonData);
        fclose($this->$file);
    }
}