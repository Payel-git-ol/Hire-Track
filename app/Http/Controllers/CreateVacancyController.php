<?php

namespace App\Http\Controllers;

use App\Service\CreateVacancyService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CreateVacancyController extends Controller
{
    public function createVacancy(Request $request)
    {
        return CreateVacancyService::createVacancy($request);
    }
}
