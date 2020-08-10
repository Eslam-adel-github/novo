<?php
namespace App\Helpers\Classes;

use Illuminate\Support\Collection;
use Auth;
class UserType{
    const admin = 0;
    const vendor = 1;
    const user = 2;

    public static function Text($type){
        switch ($type) {
            case self::admin:
                return __('Admin');
            break;
            case self::vendor:
                return __('Vendor');
            break;
            case self::user:
                return __('Users');
            break;
        }
    }

    public static function types():Collection{
        return collect([
            [
                'n'=>self::admin,
                'name'=>'admin'
            ],
            [
                'n'=>self::vendor,
                'name'=>'vendor'
            ],
            [
                'n'=>self::user,
                'name'=>'user'
            ]
        ]);
    }

    public static function keys():Array{
        return [
            self::admin=>__('main.admin'),
            self::vendor=>__('main.vendor'),
            self::user=>__('main.user'),
        ];
    }

    public static function check($types):bool{
        $userType = Auth::user()->type;

        $match= false;
        if(is_array($types)){
            foreach($types as $v){
                if($userType == $v){
                    $match=true;
                    break;
                }
            }
        }else{
            $match = $userType == $types;
        }

        return $match;
    }

    
    public static function prefix($type = false){
        if(!$type){
            $type = Auth::user()->type;
        }
        switch ($type) {
            
            case userType()::vendor:
                return config('system.vendor.name');
                break;
            case userType()::admin:
                    return config('system.admin.name');
                    break;
                
            default:
                # code...
                break;
        }

        $match= false;
        if(is_array($types)){
            foreach($types as $v){
                if($userType == $v){
                    $match=true;
                    break;
                }
            }
        }else{
            $match = $userType == $types;
        }

        return $match;
    }
}