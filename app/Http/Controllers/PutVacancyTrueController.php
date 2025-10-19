<?php

namespace App\Http\Controllers;

use App\Service\PutVacancyTrueService;

class PutVacancyTrueController
{
    public function putVacancyTrue(string $id)
    {
        return PutVacancyTrueService::putVacancyTrue($id);
    }
}
