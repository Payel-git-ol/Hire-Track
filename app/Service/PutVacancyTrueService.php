<?php

namespace App\Service;

use App\Models\Vacancy;

class PutVacancyTrueService
{
    public static function putVacancyTrue(string $id)
    {
        $putVacancyStatusTrue = Vacancy::find($id);

        $putVacancyStatusTrue->vacancy_approval = 'true';
        $putVacancyStatusTrue->save();

        return response()->json([
            'success' => true,
            'data' => $putVacancyStatusTrue
        ]);
    }
}
