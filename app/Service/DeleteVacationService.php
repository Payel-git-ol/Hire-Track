<?php

namespace App\Service;

use App\Models\Vacancy;

class DeleteVacationService
{
    public static function deleteVacationById($id)
    {
        $deleteVacation = Vacancy::find($id)->delete();

        return response()->json(['message' => 'Vacation deleted']);
    }
}
