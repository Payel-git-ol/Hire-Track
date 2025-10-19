<?php

namespace App\Service;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class FilterExistenceVacanciesService
{
    public static function filterExistenceVacanciesService(Request $request)
    {
        $exists = Vacancy::where(
            'vacancies.name', $request->user()->name
        )->where(
            'vacancies.job_title', $request->job_title
        )->where(
            'vacancies.title', $request->title
        )->where(
            'vacancies.experience', $request->experience)->first();

        if ($exists) {
            return response()->json(['message' => 'Vacancy already exists'], 409);
        }
    }
}
