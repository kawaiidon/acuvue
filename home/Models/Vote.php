<?php
/**
 * Created by PhpStorm.
 * User: darkb
 * Date: 6/22/2018
 * Time: 12:45 PM
 */

namespace APPLICATION_HOME\Models;


use STALKER_CMS\Vendor\Models\BaseModel;

class Vote extends BaseModel
{
    protected $fillable = [
        'name', 'email', 'video_id', 'link', 'type', 'social_id'
    ];
}