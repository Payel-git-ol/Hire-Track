<?php

namespace App\Service;

use App\Models\Vacancy;

class GetVacationByIdService
{
    public static function getVacationById(string $id)
    {
        $vacancies = Vacancy::find($id);

        return response()->json($vacancies);
    }
}
