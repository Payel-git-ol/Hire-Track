<?php

namespace App\Service;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class CreateVacancyService
{
    public static function createVacancy(Request $request)
    {
        try {
            FilterExistenceVacanciesService::filterExistenceVacanciesService($request);
        } catch (\RuntimeException $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }


        $vacancy = Vacancy::create([
            'name' => $request->user()->name,
            'job_title' => $request->job_title,
            'title' => $request->title,
            'experience' => $request->experience,
        ]);

       return response()->json([
           'Vacancy created!',
           'data' => $vacancy
       ], 201);
    }
}
