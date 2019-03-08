<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(!class_exists('SnapLibUIU')) {
class SnapLibUIU
{
    public static function echoBoolean($val)
    {
        echo $val ? 'true' : 'false';
    }

    public static function echoChecked($val)
    {
        // filter_var is available in >= php 5.2 
        if (function_exists('filter_var') && defined('FILTER_VALIDATE_BOOLEAN')) {
            echo filter_var($val, FILTER_VALIDATE_BOOLEAN) ? 'checked' : '';
        } else {
            echo $val ? 'checked' : '';
        }
    }

    public static function echoDisabled($val)
    {
        echo $val ? 'disabled' : '';
    }

    public static function echoSelected($val)
    {
        echo $val ? 'selected' : '';
    }

    public static function getSelected($val)
    {
        return ($val ? 'selected' : '');
    }
}

}