<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing-page/landing-page');
});

Route::get('/logout', function () {
    return view('auth/logout', ['page_title' => 'Logout']);
})->name('logout');

Route::group(['middleware' => ['web']], function () {

    Route::get('/login', function () {
        return view('auth/login', ['page_title' => 'Login']);
    })->name('login');

    Route::get('/register', function () {
        return view('auth/register', ['page_title' => 'Register']);
    })->name('register');

    Route::group(
        [
            'middleware' => ['auth:sanctum', 'role.admin'],
            'prefix' => '/admin',
        ],
        function () {

            // ------------DASHBOARD--------------- //
            Route::get('/dashboard', function () {
                return view('admin/dashboard/dashboard', ['page_title' => 'Dashboard']);
            })->name('admin_dashboard');

            // ------------FEEDING PROGRAMS--------------- //
            Route::get('/activities', function () {
                return view('admin/feeding-program/feeding-program', ['page_title' => 'Activities']);
            })->name('admin_activities');

            Route::get('/activities/activity/{id}', function ($id) {
                return view('admin/feeding-program/view-feeding-program', ['page_title' => 'Activities', 'feeding_program_id' => $id]);
            })->name('admin_feeding_program_details');

            // ------------CALENDAR--------------- //
            Route::get('/calendar', function () {
                return view('admin/calendar/calendar', ['page_title' => 'Calendar']);
            })->name('admin_calendar');

            // ------------ANNOUNCEMENTS--------------- //
            Route::get('/announcements', function () {
                return view('admin/announcement/announcement', ['page_title' => 'Announcements']);
            })->name('admin_announcement');

            // ------------INDIVIDUAL RECORDS--------------- //
            Route::get('/individual_records', function () {
                return view('admin/individual-record/individual-record', ['page_title' => 'Individual Records']);
            })->name('admin_individual_record');

            Route::get('/individual_records/individual_record/{id}', function ($id) {
                return view('admin/individual-record/view-individual-record', ['page_title' => 'Individual Records', 'individual_record_id' => $id]);
            })->name('admin_individual_record_details');

            // ------------COMPLEMENTARY FEEDING--------------- //
            Route::get('/complementary_feeding', function () {
                return view('admin/complementary-feeding/complementary-feeding', ['page_title' => 'Complementary Feeding']);
            })->name('admin_complementary_feeding');

            Route::get('/complementary_feeding/complementary_feeding/{id}', function ($id) {
                return view('admin/complementary-feeding/view-complementary-feeding', ['page_title' => 'Complementary Feeding', 'complementary_feeding_id' => $id]);
            })->name('admin_complementary_feeding_details');

            // ------------USERS--------------- //
            Route::get('/users', function () {
                return view('admin/user/user', ['page_title' => 'User Accounts']);
            })->name('admin_user');

            // ------------ROLES--------------- //
            Route::get('/roles', function () {
                return view('admin/role/role', ['page_title' => 'Roles']);
            })->name('admin_role');

            // ------------SLIDESHOW CONTENTS--------------- //
            Route::get('/slideshow_contents', function () {
                return view('admin/slideshow-content/slideshow-content', ['page_title' => 'Slideshow Contents']);
            })->name('admin_post');

            // ------------SETTINGS--------------- //
            Route::get('/settings', function () {
                return view('admin/settings/settings', ['page_title' => 'Settings']);
            })->name('admin_settings');

            // ------------FAQS--------------- //
            Route::get('/faqs', function () {
                return view('admin/faq/faq', ['page_title' => 'FAQs']);
            })->name('admin_faq');

            // ------------CATEGORIES--------------- //
            Route::get('/categories', function () {
                return view('admin/categories/categories', ['page_title' => 'Categories / Legends']);
            })->name('admin_categories');

            // ------------GENERATE REPORTS--------------- //
            Route::get('/graph_reports', function () {
                return view('admin/generate-report/graph-reports', ['page_title' => 'Graph Reports']);
            })->name('admin_graph_reports');

            Route::get('/reports_overview', function () {
                return view('admin/generate-report/reports-overview', ['page_title' => 'Reports Overview']);
            })->name('admin_reports_overview');
        }
    );

    Route::group(
        [
            'middleware' => ['auth:sanctum', 'role.user'],
            'prefix' => '/user',
        ],
        function () {

            // ------------DASHBOARD--------------- //
            Route::get('/dashboard', function () {
                return view('user/dashboard/dashboard', ['page_title' => 'Dashboard']);
            })->name('user_dashboard');

            // ------------INDIVIDUAL RECORDS--------------- //
            Route::get('/individual_records', function () {
                return view('user/individual-record/individual-record', ['page_title' => 'Individual Records']);
            })->name('user_individual_record');

            Route::get('/individual_records/individual_record/{id}', function ($id) {
                return view('user/individual-record/view-individual-record', ['page_title' => 'Individual Records', 'individual_record_id' => $id]);
            })->name('user_individual_record_details');

            // ------------FEEDING PROGRAMS--------------- //
            Route::get('/feeding_programs', function () {
                return view('user/feeding-program/feeding-program', ['page_title' => 'Feeding Programs']);
            })->name('user_feeding_program');

            Route::get('/feeding_programs/feeding_program/{id}', function ($id) {
                return view('user/feeding-program/view-feeding-program', ['page_title' => 'Feeding Programs', 'feeding_program_id' => $id]);
            })->name('user_feeding_program_details');

            // ------------SETTINGS--------------- //
            Route::get('/settings', function () {
                return view('user/settings/settings', ['page_title' => 'Settings']);
            })->name('user_settings');

            // ------------ANNOUNCEMENTS--------------- //
            Route::get('/announcements', function () {
                return view('user/announcement/announcement', ['page_title' => 'Announcements']);
            })->name('user_announcement');

            // ------------FAQS--------------- //
            Route::get('/faqs', function () {
                return view('user/faq/faq', ['page_title' => 'FAQs']);
            })->name('user_faq');

        }
    );

});


