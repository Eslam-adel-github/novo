<?php

use Illuminate\Support\Collection;

/**
 *
 * @param  string $url 'url into admin pages'
 * @return string $url
 */
function aurl(string $url)
{
    return url(config('system.admin.prefix') . $url);
}


/**
 * the image dynamic function
 * @param string $dir           'image directory'
 * @param $image
 * @param $checkFunction
 * @return string
 */
function UploadImages(string $dir, $image, $checkFunction = null): string
{
    $saveImage = '';

    if (!File::exists(public_path('uploads') . '/' . $dir)) { // if file or fiolder not exists
        /**
         *
         * @param $PATH Required
         * @param $mode Defualt 0775
         * @param create the directories recursively if doesn't exists
         */
        File::makeDirectory(public_path('uploads') . '/' . $dir, 0775, true); // create the dir or the
    }

    if (File::isFile($image)) {
        ini_set('memory_limit', '-1');

        $name = $image->getClientOriginalName(); // get image name
        $extension  = $image->getClientOriginalExtension(); // get image extension
        $sha1       = sha1($name); // hash the image name
        $fileName   = rand(1, 1000000) . "_" . date("y-m-d-h-i-s") . "_" . $sha1 . "." . $extension; // create new name for the image

        // if (! is_null($checkFunction)) {
        //     if (!$checkFunction($extension)) {
        //         return false;
        //     }
        // }
        if (checkImages($extension)) {
            $uploadedImage = Image::make($image->getRealPath());
            $uploadedImage->save(public_path('uploads/' . $dir . '/' . $fileName), '100'); // save the image
        }
        else {
            $image->move(public_path('uploads/' . $dir), $fileName);
        }

        $saveImage = $dir . '/' . $fileName; // get the name of the image and the dir that uploaded in
    }

    return $saveImage;
}

/**
 * Return The Image With Path
 * @param string $image
 * @return string $image
 */
function ShowImage($image, $width = 200, $height = 150): string
{
    if (!is_null($image) && !empty($image) && File::exists(public_path('uploads') . '/' . $image)) {
        return asset('uploads/' . $image);
    }
    return "https://place-hold.it/{$width}x{$height}";
}

/**
 * userCan description
 * @param  string $permission
 * @return bool
 */
function userCan(string $permission): bool
{
    static $permissions = null;

    if (is_null($permissions)) {
        $permissions = auth()->user()->getAllPermissions()->pluck('name')->toArray();
    }

    // Reset cached roles and permissions
    app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

    return in_array($permission, $permissions);
}


/**
 * getData
 *
 * gets data from old() and $edit
 */
function getData(Collection $data, $attr)
{
    return $data->has($attr) ? $data[$attr] : null;
}


/**
 * Check Var Value
 *
 * Checks The Empty And Null Vals
 */
function checkVar($val)
{
    return !empty($val) && !is_null($val);
}

/**
 * Check If The Given Value Is Json.
 *
 * @param  string $string
 * @return bool
 */
function isJson(string $string) : bool
{
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}

/**
 * panic
 *
 * throws an exception with the specified message
 *
 * @return Exception
 */
function panic($msg)
{
    throw new \Exception($msg);
}

/**
 * Is Active Function Checks If The Current Menu Link IS Active.
 *
 * @param  mixed   $url
 * @param  boolean $is_parent_menu
 * @return string
 */
function is_active($url, $is_parent_menu = false): string
{
    if(\Request::is($url."*")){
        return $is_parent_menu ? 'kt-menu__item--submenu kt-menu__item--open kt-menu__item--here' : 'kt-menu__item--active';

    }
    /*
    if (active_route($url)) {
        return $is_parent_menu ? 'kt-menu__item--submenu kt-menu__item--open kt-menu__item--here' : 'kt-menu__item--active';
    }
    */
    return '';
}


function userType(){
    return \App\Helpers\Classes\UserType::class;
}

function attribute($key,$default=null){

    $fb = app()->make('App\Application')->where(['key'=>$key,'metable_type'=>'App\Application'])->first();
    if($fb){
        return $fb->value;
    }else{
        return $default;
    }
}
/*
function route($name,$params=[]){
    $route = null;
    if (userType()::check(userType()::admin)){
        $route = config('system.admin.name').$name;
    }else{
        $route = config('system.vendor.name').$name;
    }
    if(Route::has($route)){
        return route($route,$params);
    }
    return null;
}*/
function price_conversion($money){
    //$currency_id_from=\App\Me::where("key","default_currency")->first()?json_decode(Meta::where("key","default_currency")->first()->value):0;
    $currency_id_from= attribute("default_currency",0);
    $currency_conversion_rate=1;
    if(session()->get('currency') !=null){
        $currency_id_to=session()->get('currency.id');
        if($currency_id_to !=$currency_id_from){
            $currency_conversion_rate=\App\CurrencyConversion::where("from_currency_id",$currency_id_from)->where("to_currency_id",$currency_id_to)->first()?\App\CurrencyConversion::where("from_currency_id",$currency_id_from)->where("to_currency_id",$currency_id_to)->first()->rate:1;
        }
        //$currency_conversion_rate=$currency_conversion_rate;
        return round($money*$currency_conversion_rate,2);
    }
    return round($money*$currency_conversion_rate,2);

}
function symbol(){
    $currency_id_from= attribute("default_currency",0);
    $symbol="";
    if(session()->get('currency') !=null){
        $symbol=session("currency.symbol");
    }
    else{
        $symbol=$currency_symbol=\App\Currency::find($currency_id_from)?\App\Currency::find($currency_id_from)->symbol:"";;
    }
    return $symbol;
}
function conversion_rate(){
    //$currency_id_from=\App\Me::where("key","default_currency")->first()?json_decode(Meta::where("key","default_currency")->first()->value):0;
    $currency_id_from= attribute("default_currency",0);
    $currency_conversion_rate=1;
    if(session()->get('currency') !=null){
        $currency_id_to=session()->get('currency.id');
        if($currency_id_to !=$currency_id_from){
            $currency_conversion_rate=\App\CurrencyConversion::where("from_currency_id",$currency_id_from)->where("to_currency_id",$currency_id_to)->first()?\App\CurrencyConversion::where("from_currency_id",$currency_id_from)->where("to_currency_id",$currency_id_to)->first()->rate:1;
        }
    }
    return $currency_conversion_rate;
}
function ShowImageFromStorage($entity, $collection, $type = 'thumb')
{
    if (!is_null($entity) && !is_null($collection)) {
        if (!empty($entity->getMedia($collection)[0])) {
            return $entity->getMedia($collection)[0]->getUrl($type);
        }
    }
    return asset("images/ibrain_logo.svg");
}

function getFirstCharacters($string)
{
    $words = explode(" ", $string);
    $letters = "";
    foreach ($words as $value) {
        $letters .= substr($value, 0, 1);
    }
    return $letters;
}
/**
 * Get App Routes.
 *
 * @return array
 */
function getAppRoutes()
{
    $routes = [];

    foreach (\Route::getRoutes()->getIterator() as $route) {
        if (isset($route->action['as'])) {
            $exploded = explode('.', $route->action['as']);

            if (isset($exploded[1]) && in_array($exploded[1], ['create', 'index'])) {
                $routes[] = $route;
            }
        }
    }

    return $routes;
}

