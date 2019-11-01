<?php

class Person
{
    public $name;
    public $surname;
    public $patronymic;
    public $gender;

    public const GENDER_MALE = 1;
    public const GENDER_FEMALE = -1;
    public const GENDER_UNDEFINED = 0;

    public function __construct($name = '', $surname = '', $patronymic = '')
    {
        $this->name = $name;
        $this->surname = $surname;

        if ($patronymic != null) {
            $this->patronymic = $patronymic;
            $patronymicEnding = mb_substr($patronymic, -3);

            if ($patronymicEnding == 'вич' || $patronymicEnding == 'ьич' || $patronymicEnding == 'тич' || $patronymicEnding == 'глы') {
                $this->gender = self::GENDER_MALE;
            } elseif ($patronymicEnding == 'вна' || $patronymicEnding == 'чна' || $patronymicEnding == 'шна' || $patronymicEnding == 'ызы') {
                $this->gender = self::GENDER_FEMALE; 
            } else {
                $this->gender = self::GENDER_UNDEFINED;
            }
        } else {
            $this->gender = self::GENDER_UNDEFINED; 
        }
    }

    public function getFio()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic . ' ';
    }

    public function getGender() 
    {
        if ($this->gender === 1) {
            return 'male';
        }
        if ($this->gender === 0) {
            return 'undefined';
        }
        if ($this->gender === -1) {
            return 'female';
        }
    }

    public function getGenderSymbol() 
    {
        if ($this->gender === 1) {
            return '♂';
        }
        if ($this->gender === 0) {
            return '😎';
        }
        if ($this->gender === -1) {
            return '♀';
        }
    }
}