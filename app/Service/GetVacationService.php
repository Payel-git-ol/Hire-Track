<?php

namespace App\Service;

use App\Models\Vacancy;

class GetVacationService
{
    public static function getVacation()
    {
        $getUserVacation = Vacancy::all();

        return response()->json($getUserVacation);
    }
}
