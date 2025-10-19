<?php

namespace App\Service;

use App\Models\Vacancy;

class PutVacancyFalseService
{
    public static function putVacancyFalse(string $id)
    {
        $putVacancyFalse = Vacancy::find($id);

        $putVacancyFalse->vacancy_approval = false;
        $putVacancyFalse->save();

        return $putVacancyFalse;
    }
}
