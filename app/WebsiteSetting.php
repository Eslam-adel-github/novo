<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'data'
    ];

    /**
     * Set Option key.
     *
     * @return string
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value, true);
    }

    /**
     * Get Option key.
     *
     * @return string
     */
    public function getDataAttribute()
    {
        return $this->attributes['data'] ? json_decode($this->attributes['data'], true) : '';
    }
}
