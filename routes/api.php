<?php


use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// CONTROLLERS
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedingProgramController;
use App\Http\Controllers\ContentDirectoryController;
use App\Http\Controllers\IndividualRecordController;
use App\Http\Controllers\FeedingProgramIRLogsController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryOfIndividualRecordController;

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

Route::get('/user/search/{user}', [UserController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/announcements/published', [AnnouncementController::class, 'published']);
Route::get('/feeding_programs/published', [FeedingProgramController::class, 'published']);
Route::get('/faqs', [FaqController::class, 'index']);



Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/change_password', [AuthController::class, 'changePassword']);

    // IMPORT RECORDS
    Route::post('/individual_records/import', [IndividualRecordController::class, 'import']);

    // DASHBOARD
    Route::get('/dashboard/getCounts', [DashboardController::class, 'getCounts']);

    Route::get('/roles/datatable', [RoleController::class, 'datatable']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    Route::put('/roles/{id}', [RoleController::class, 'update']);
    Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy']);
    Route::put('/roles/restore/{id}', [RoleController::class, 'restore']);


    // ROLE
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/datatable', [RoleController::class, 'datatable']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    Route::put('/roles/{id}', [RoleController::class, 'update']);
    Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy']);
    Route::put('/roles/restore/{id}', [RoleController::class, 'restore']);

    // USER
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/datatable', [UserController::class, 'datatable']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy']);
    Route::put('/users/restore/{id}', [UserController::class, 'restore']);

    // INDIVIDUAL RECORD
    Route::get('/individual_records', [IndividualRecordController::class, 'index']);
    Route::get('/individual_records/datatable', [IndividualRecordController::class, 'datatable']);
    Route::post('/individual_records', [IndividualRecordController::class, 'store']);
    Route::get('/individual_records/{id}', [IndividualRecordController::class, 'show']);
    Route::put('/individual_records/{id}', [IndividualRecordController::class, 'update']);
    Route::delete('/individual_records/destroy/{id}', [IndividualRecordController::class, 'destroy']);
    Route::put('/individual_records/restore/{id}', [IndividualRecordController::class, 'restore']);

    // HISTORY OF INDIVIDUAL RECORD
    Route::get('/history_of_individual_records', [HistoryOfIndividualRecordController::class, 'index']);
    Route::get('/history_of_individual_records/datatable', [HistoryOfIndividualRecordController::class, 'datatable']);
    Route::post('/history_of_individual_records', [HistoryOfIndividualRecordController::class, 'store']);
    Route::get('/history_of_individual_records/{id}', [HistoryOfIndividualRecordController::class, 'show']);
    Route::put('/history_of_individual_records/{id}', [HistoryOfIndividualRecordController::class, 'update']);
    Route::delete('/history_of_individual_records/destroy/{id}', [HistoryOfIndividualRecordController::class, 'destroy']);
    Route::put('/history_of_individual_records/restore/{id}', [HistoryOfIndividualRecordController::class, 'restore']);
    Route::get('/history_of_individual_records/search_individual_records/{id}', [HistoryOfIndividualRecordController::class, 'search_individual_records']);
    Route::post('/history_of_individual_records/data_chart/{month}', [HistoryOfIndividualRecordController::class, 'data_chart']);


    // FEEDING PROGRAM
    Route::get('/feeding_programs', [FeedingProgramController::class, 'index']);
    Route::get('/feeding_programs/datatable', [FeedingProgramController::class, 'datatable']);
    Route::post('/feeding_programs', [FeedingProgramController::class, 'store']);
    Route::get('/feeding_programs/{id}', [FeedingProgramController::class, 'show']);
    Route::put('/feeding_programs/{id}', [FeedingProgramController::class, 'update']);
    Route::delete('/feeding_programs/destroy/{id}', [FeedingProgramController::class, 'destroy']);
    Route::put('/feeding_programs/restore/{id}', [FeedingProgramController::class, 'restore']);

    // FEEDING PROGRAM IR LOGS
    Route::get('/feeding_program_ir_logs', [FeedingProgramIRLogsController::class, 'index']);
    Route::get('/feeding_program_ir_logs/datatable', [FeedingProgramIRLogsController::class, 'datatable']);
    Route::post('/feeding_program_ir_logs', [FeedingProgramIRLogsController::class, 'store']);
    Route::get('/feeding_program_ir_logs/{id}', [FeedingProgramIRLogsController::class, 'show']);
    Route::get('/feeding_program_ir_logs/search_feeding_programs/{id}', [FeedingProgramIRLogsController::class, 'search_feeding_programs']);
    Route::get('/feeding_program_ir_logs/search_individual_records/{id}', [FeedingProgramIRLogsController::class, 'search_individual_records']);
    Route::put('/feeding_program_ir_logs/{id}', [FeedingProgramIRLogsController::class, 'update']);
    Route::delete('/feeding_program_ir_logs/destroy/{id}', [FeedingProgramIRLogsController::class, 'destroy']);
    Route::put('/feeding_program_ir_logs/restore/{id}', [FeedingProgramIRLogsController::class, 'restore']);
    Route::post('/feeding_program_ir_logs/multi_insert', [FeedingProgramIRLogsController::class, 'multi_insert']);
    Route::get('/feeding_program_ir_logs/get_unregistered_individual/{feeding_program_id}', [FeedingProgramIRLogsController::class, 'get_unregistered_individual']);

    // CONTENT_DIRECTORY
    Route::get('/content_directories', [ContentDirectoryController::class, 'index']);
    Route::get('/content_directories/datatable', [ContentDirectoryController::class, 'datatable']);
    Route::post('/content_directories', [ContentDirectoryController::class, 'store']);
    Route::get('/content_directories/{id}', [ContentDirectoryController::class, 'show']);
    Route::put('/content_directories/{id}', [ContentDirectoryController::class, 'update']);
    Route::delete('/content_directories/destroy/{id}', [ContentDirectoryController::class, 'destroy']);
    Route::put('/content_directories/restore/{id}', [ContentDirectoryController::class, 'restore']);

    // ANOUNCEMENTS
    Route::get('/announcements', [AnnouncementController::class, 'index']);
    Route::get('/announcements/datatable', [AnnouncementController::class, 'datatable']);
    Route::post('/announcements', [AnnouncementController::class, 'store']);
    Route::get('/announcements/{id}', [AnnouncementController::class, 'show']);
    Route::put('/announcements/{id}', [AnnouncementController::class, 'update']);
    Route::delete('/announcements/destroy/{id}', [AnnouncementController::class, 'destroy']);
    Route::put('/announcements/restore/{id}', [AnnouncementController::class, 'restore']);

    // FAQS
    Route::get('/faqs/datatable', [FaqController::class, 'datatable']);
    Route::post('/faqs', [FaqController::class, 'store']);
    Route::get('/faqs/{id}', [FaqController::class, 'show']);
    Route::put('/faqs/{id}', [FaqController::class, 'update']);
    Route::delete('/faqs/destroy/{id}', [FaqController::class, 'destroy']);
    Route::put('/faqs/restore/{id}', [FaqController::class, 'restore']);
});
