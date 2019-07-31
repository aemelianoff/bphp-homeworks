<?php
class Users extends JsonDataArray {
    public function displaySortedList() {
        $jsonFileAccessModel = new JsonFileAccessModel('users.json');
        $read = $jsonFileAccessModel->read();
        return $read;
    }
}