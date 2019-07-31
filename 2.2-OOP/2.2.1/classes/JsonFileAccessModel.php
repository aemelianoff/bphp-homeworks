<?php
class JsonFileAccessModel {
    protected $fileName;
    protected $file;

    public function __construct($name) {
        $this->fileName = Config::DATABASE_PATH . $name;
    }

    private function connect() {
        $this->file = fopen($this->fileName, 'r+') or die("не удалось открыть файл");
    }

    private function disconnect() {
        fclose($this->file);
    }

    public function read() {
        $this->connect();
        $readFile = fread($this->file, filesize($this->fileName));
        $this->disconnect();
        return $readFile;
    }

    public function write($textToWrite) {
        $this->connect();
        fwrite($this->file, $textToWrite);
        $this->disconnect();
    }

    public function readJson() {
        $this->connect();
        $readFile = fread($this->file, filesize($this->$ileName));
        $jsonData = json_encode($readFile, JSON_PRETTY_PRINT);
        $this->disconnect();
        return $jsonData;
    }

    public function writeJson($textToWrite) {
        $this->connect();
        $jsonData = json_encode($textToWrite, JSON_PRETTY_PRINT);
        fwrite($this->file, $jsonData);
        $this->disconnect();
    }
}