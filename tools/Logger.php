<?php
/**
 * Created by PhpStorm.
 * User: cci
 * Date: 13/04/18
 * Time: 11:08
 */

class Logger
{
    public function log($message){
        error_log($message);
    }

}