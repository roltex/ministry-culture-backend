<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\CalendarController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\CompetitionController;
use App\Http\Controllers\Api\VacancyController;
use App\Http\Controllers\Api\LegislationController;
use App\Http\Controllers\Api\SubordinateInstitutionController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\StatsController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\DeputyMinisterController;
use App\Http\Controllers\Api\OtherStructureController;
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
    
    // Calendar endpoints
    Route::get('/calendars', [CalendarController::class, 'index']);
    Route::get('/calendars/featured', [CalendarController::class, 'featured']);
    Route::get('/calendars/upcoming', [CalendarController::class, 'upcoming']);
    Route::get('/calendars/{slug}', [CalendarController::class, 'show']);
    
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
    Route::get('/legislation/{slug}', [LegislationController::class, 'show']);
    Route::post('/legislation/{slug}/download', [LegislationController::class, 'download']);
    
    // Subordinate Institutions endpoints
    Route::get('/subordinate-institutions', [SubordinateInstitutionController::class, 'index']);
    Route::get('/subordinate-institutions/featured', [SubordinateInstitutionController::class, 'featured']);
    Route::get('/subordinate-institutions/types', [SubordinateInstitutionController::class, 'types']);
    Route::get('/subordinate-institutions/type/{type}', [SubordinateInstitutionController::class, 'byType']);
    Route::get('/subordinate-institutions/{id}', [SubordinateInstitutionController::class, 'show']);
    Route::get('/subordinate-institutions/slug/{slug}', [SubordinateInstitutionController::class, 'showBySlug']);
    
    // Pages endpoints
    Route::get('/pages', [PageController::class, 'index']);
    Route::get('/pages/featured', [PageController::class, 'featured']);
    Route::get('/pages/{slug}', [PageController::class, 'show']);
    
    // Menu endpoints
    Route::get('/menus', [MenuController::class, 'index']);
    Route::get('/menus/tree', [MenuController::class, 'tree']);
    Route::get('/menus/types', [MenuController::class, 'types']);
    Route::get('/menus/targets', [MenuController::class, 'targets']);
    Route::get('/menus/routes', [MenuController::class, 'routes']);
    Route::get('/menus/parent/{parentId}', [MenuController::class, 'byParent']);
    Route::get('/menus/{id}', [MenuController::class, 'show']);
    
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

    // Procurements endpoints
    Route::get('/procurements', [\App\Http\Controllers\Api\ProcurementController::class, 'index']);
    Route::get('/procurements/{slug}', [\App\Http\Controllers\Api\ProcurementController::class, 'show']);

    // Legal Acts endpoints
    Route::get('/legal-acts', [\App\Http\Controllers\Api\LegalActController::class, 'index']);
    Route::get('/legal-acts/{slug}', [\App\Http\Controllers\Api\LegalActController::class, 'show']);

    // Reports endpoints
    Route::get('/reports', [\App\Http\Controllers\Api\ReportController::class, 'index']);
    Route::get('/reports/{slug}', [\App\Http\Controllers\Api\ReportController::class, 'show']);

    // Ministry Structure endpoints
    Route::get('/ministry-structures', [\App\Http\Controllers\Api\MinistryStructureController::class, 'index']);
    Route::get('/ministry-structures/{id}', [\App\Http\Controllers\Api\MinistryStructureController::class, 'show']);
    
    // Other Structures endpoints
    Route::get('/other-structures', [OtherStructureController::class, 'index']);
    Route::get('/other-structures/{id}', [OtherStructureController::class, 'show']);
    
    // Deputy Ministers endpoints
    Route::get('/deputy-ministers', [DeputyMinisterController::class, 'index']);
    Route::get('/deputy-ministers/{id}', [DeputyMinisterController::class, 'show']);
}); 