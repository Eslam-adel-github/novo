<?php

/**
 * Get The Application Languages.
 *
 * @return array
 */
function AppLanguages() : array
{
    return config('app.locales');
}

/**
 * Get The Application Locale.
 *
 * @return string
 */
function GetLanguage() : string
{
    return app()->getLocale();
}

/**
 * Get's The Site Direction.
 *
 * @return string
 */
function GetDirection() : string
{
    return GetLanguage() == 'ar' ? 'rtl' : 'ltr';
}

/**
 * Get's The Default Language.
 *
 * @return string
 */
function GetDefaultLang() : string
{
    return config('app.locale');
}

/**
 * if design isRtl.
 *
 * @return bool
 */
function isRtl() : bool
{
    return GetLanguage() == 'ar';
}

/**
 * Get A Json Value By Language.
 *
 * @param  mixed  $var
 * @param  string $lang
 * @return string
 */
function VarByLang($var, string $lang = null) : string
{
    if (is_null($lang)) {
        $lang = GetDefaultLang();
    }

    if (!isJson($var)) {
        return $var;
    }

    if (!empty($var)) {
        return collect(json_decode($var))->has($lang) ? collect(json_decode($var))[$lang] : '';
    }

    return '';
}

function addRtl() : string
{
    return GetDirection() == 'rtl' ? '.rtl' : '';
}
function GetLanguageValues($language, $key) : string
{
    return config('languages.language.'.$language)[$key];
}

