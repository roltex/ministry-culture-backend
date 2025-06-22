<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\CompetitionController;
use App\Http\Controllers\Api\VacancyController;
use App\Http\Controllers\Api\LegislationController;
use App\Http\Controllers\Api\SubordinateInstitutionController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\StatsController;
use App\Http\Middleware\SetLocaleFromHeader;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Routes for Ministry of Culture and Sport of Georgia
Route::prefix('v1')->middleware([
    SetLocaleFromHeader::class
])->group(function () {
    
    // News endpoints
    Route::get('/news', [NewsController::class, 'index']);
    Route::get('/news/featured', [NewsController::class, 'featured']);
    Route::get('/news/{slug}', [NewsController::class, 'show']);
    
    // Projects endpoints
    Route::get('/projects', [ProjectController::class, 'index']);
    Route::get('/projects/featured', [ProjectController::class, 'featured']);
    Route::get('/projects/statuses', [ProjectController::class, 'statuses']);
    Route::get('/projects/{slug}', [ProjectController::class, 'show']);
    
    // Competitions endpoints
    Route::get('/competitions', [CompetitionController::class, 'index']);
    Route::get('/competitions/active', [CompetitionController::class, 'active']);
    Route::get('/competitions/{slug}', [CompetitionController::class, 'show']);
    
    // Vacancies endpoints
    Route::get('/vacancies', [VacancyController::class, 'index']);
    Route::get('/vacancies/active', [VacancyController::class, 'active']);
    Route::get('/vacancies/{slug}', [VacancyController::class, 'show']);
    
    // Legislation endpoints
    Route::get('/legislation', [LegislationController::class, 'index']);
    Route::get('/legislation/categories', [LegislationController::class, 'categories']);
    Route::get('/legislation/{id}', [LegislationController::class, 'show']);
    Route::post('/legislation/{id}/download', [LegislationController::class, 'download']);
    
    // Subordinate Institutions endpoints
    Route::get('/subordinate-institutions', [SubordinateInstitutionController::class, 'index']);
    Route::get('/subordinate-institutions/featured', [SubordinateInstitutionController::class, 'featured']);
    Route::get('/subordinate-institutions/types', [SubordinateInstitutionController::class, 'types']);
    Route::get('/subordinate-institutions/type/{type}', [SubordinateInstitutionController::class, 'byType']);
    Route::get('/subordinate-institutions/{id}', [SubordinateInstitutionController::class, 'show']);
    Route::get('/subordinate-institutions/slug/{slug}', [SubordinateInstitutionController::class, 'showBySlug']);
    
    // Settings endpoints
    Route::get('/settings', [SettingController::class, 'index']);
    Route::get('/settings/all', [SettingController::class, 'all']);
    Route::get('/settings/contact', [SettingController::class, 'contact']);
    Route::get('/settings/social', [SettingController::class, 'social']);
    
    // Contact form endpoint (to be implemented)
    Route::post('/contact', function (Request $request) {
        // TODO: Implement contact form submission
        return response()->json([
            'success' => true,
            'message' => 'Contact form submitted successfully',
        ]);
    });

    // Stats endpoint
    Route::get('/stats', [StatsController::class, 'index']);
}); 