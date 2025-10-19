<?php

namespace App\Http\Controllers;

use App\Service\GetVacationByIdService;
use Illuminate\Routing\Controller;

class GetVacationByIdController extends Controller
{
    public function getVacationById(string $id)
    {
        return GetVacationByIdService::getVacationById($id);
    }
}
