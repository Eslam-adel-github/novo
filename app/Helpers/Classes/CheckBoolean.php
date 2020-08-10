<?php
namespace App\Helpers\Classes;

class CheckBoolean{
    const TRUE = true;
    const FALSE = false;

    public static function isTrue($value){
        if($value === 'yes' || $value === '1' || $value === 1 || $value === 'ok'){
            return true;
        }
        return false;
    }

    public static function isFalse($value){
        if($value === 'no' || $value === '0' || $value === 0){
            return true;
        }
        return false;
    }

}