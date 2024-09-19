<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class DateFormaterHelper
{
    public static function formatToDateTime(string $timestamp): string
    {
        return Carbon::parse($timestamp)->format('d-m-Y H:i');
    }

}
