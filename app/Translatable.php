<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translatable extends Model
{
    /**
     * Magic method to Retrive the value of all fields of the model
     *
     * The method will be resposable to return the correct language for the translatables fields
     * I rely on the Resource to invoke the Accessories methods get{Field}Attribute.
     *
     * For web-based-application, I rely on Middleware to ignore translation for particular url
     * ( ex: admin/categories/ , admin/* ). The middleware will intercept the request and ignore tranlsation by setting
     * accept-language = * according to the current route url
     *
     *
     * @param string $field  [contains the attribute name of the model]
     * @return string [translated one]
     */
    public function __get($field){

        // Use laravel mechanism to assin get the value of the current attribute
        $value = parent::__get($field);


        // Check if the current field is translatable
        if(in_array($field,$this->translatable)){

            // Transform the current field to an Collection
            $value = collect(json_decode($value));
            // Retrive al supported languages in our application
            $supportedLanguages = AppLanguages();

            // Remove all languages that are not supported in our application
            $value = $value->filter(function($v,$k)use($supportedLanguages){
                if(in_array($k,$supportedLanguages)){
                    return true;
                }
            });

            /**
             * Check if the current request wants to get only one language
             */
            if(request()->header('accept-language')!='*'){
                /**
                 * check if the current field has this language, otherwise return null(for items not translated yet)
                 */
                $langauge = request()->header('Accept-Language');

                if($value->has($langauge)){
                    $value = $value->get($langauge);
                }else{
                    $value = null;
                }
            }
        }
        return $value;
    }

    public function getTranslatables(){
        return $this->translatable;
    }
}
