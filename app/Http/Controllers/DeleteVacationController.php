<?php

namespace App\Http\Controllers;

use App\Service\DeleteVacationService;
use Illuminate\Routing\Controller;

class DeleteVacationController extends Controller
{
    public function deleteVacation($id)
    {
        return DeleteVacationService::deleteVacationById($id);
    }
}
