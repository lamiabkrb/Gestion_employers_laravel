<?php

namespace App\Helpers;

use App\Models\Configuration;

class ConfigHelper{
    public static function  getAppName(){

        $appname=Configuration::where('type', 'APP_NAME')->value('value');
        return $appname;

    }
}