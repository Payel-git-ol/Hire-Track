<?php

namespace App\Http\Controllers;

use App\Service\GetVacationService;
use Illuminate\Routing\Controller;

class GetVacationController extends Controller
{
    public function getVacation()
    {
        return GetVacationService::getVacation();
    }
}
