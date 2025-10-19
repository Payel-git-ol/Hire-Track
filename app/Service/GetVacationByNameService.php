<?php

namespace App\Service;

use App\Models\Vacancy;

class GetVacationByNameService
{
    public static function getVacationByName(string $name)
    {
        $vacancies = Vacancy::where('vacancies.name', $name)->get();

        return response()->json($vacancies);
    }
}
