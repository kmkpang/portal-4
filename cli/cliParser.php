<?php
/**
 * Created by PhpStorm.
 * User: khan
 * Date: 6/19/14
 * Time: 6:16 PM
 * @copyright   Softverk Ltd
 * @license     Commercial
 * @since 3.0.0
 */

function parseArguments()
{
    global $argv,$argc;
    array_shift($argv);
    $out = array();
    $key=0;
    foreach($argv as $arg)
    {
        if(substr($arg, 0, 2) == '--')
        {
            $eqPos = strpos($arg, '=');
            if($eqPos === false)
            {
                $key = substr($arg, 2);
                $out[$key] = isset($out[$key]) ? $out[$key] : true;
            }
            else
            {
                $key = substr($arg, 2, $eqPos - 2);
                $out[$key] = substr($arg, $eqPos + 1);
            }
        }
        else if(substr($arg, 0, 1) == '-')
        {
            if(substr($arg, 2, 1) == '=')
            {
                $key = substr($arg, 1, 1);
                $out[$key] = substr($arg, 3);
            }
            else
            {
                $chars = str_split(substr($arg, 1));
                foreach($chars as $char)
                {
                    $key = $char;
                    $out[$key] = isset($out[$key]) ? $out[$key] : true;
                }
            }
        }
        else
        {
            $out[$key] = $arg;
        }
    }
    return $out;
}
