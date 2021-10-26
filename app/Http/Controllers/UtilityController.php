<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public static function get_server_memory_usage() : array
    {
        $all_memory = array_merge(array_filter(explode(" ", explode("\n", (string)trim(shell_exec('free -h')))[1])));
        return ['total' => intval($all_memory['1']), 'used' => intval($all_memory['2']), 'available' => intval($all_memory['6'])];
    }

    public static function get_server_cpu_usage()
    {
        $all_cpu_load = sys_getloadavg();
        return $all_cpu_load[0];
    }
}
