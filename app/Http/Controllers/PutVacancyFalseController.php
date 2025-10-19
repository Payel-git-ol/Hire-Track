<?php

namespace App\Http\Controllers;

use App\Service\PutVacancyFalseService;

class PutVacancyFalseController
{
    public function putVacancyFalse(string $id)
    {
        return PutVacancyFalseService::putVacancyFalse($id);
    }
}
