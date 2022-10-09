<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyCategoriesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmpAtatchmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeDetilesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\UserController;
use App\Models\CompanyCategories;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('signin');
})->middleware('guest');


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/index', [AuthController::class, 'dashboard'])->name('dashbaord');
Route::middleware(['auth'])->group(function () {


    #########################roles route ######################
    Route::prefix('roles')->group(function () {

        Route::resource('Roles', RolesController::class);
    });

    ########################## users route ######################
    Route::prefix('users')->group(function () {
        Route::resource('user', UserController::class);
    });

    ######################### company route #####################

    Route::prefix('company')->group(function () {
        Route::resource('company', CompanyController::class);
        Route::get('status/{id}', [CompanyController::class, 'status'])->name('company.status');
        Route::get('get_categories/{id}', [CompanyController::class, 'getCategories']);
    });


    Route::prefix('companyCategories')->group(function () {
        Route::resource('categories', CompanyCategoriesController::class);
        Route::get('/status', [CompanyCategoriesController::class, 'status'])->name('categories.status');
        Route::get('/get_salary/{id}', [CompanyCategoriesController::class, 'getSalary']);
    });

    ####################### jobs route ###############3
    Route::prefix('jobs')->group(function () {
        Route::resource('Jobs', JobsController::class);
        Route::get('get_salary/{id}', [JobsController::class, 'getSalary']);
    });

    ######################### employee  ################

    Route::prefix('Employee')->group(function () {
        Route::resource('employee', EmployeeController::class);
        Route::get('status', [EmployeeController::class, 'status'])->name('employee.status');
    });
    ######################## employeee Attachment #################

    Route::prefix('attachment')->group(function () {
        Route::resource('attachment', EmpAtatchmentController::class);
        Route::get('file/{emp_id}/{attch_id}', [EmpAtatchmentController::class, 'file'])->name('attchment.file');
        Route::get('download/{emp_id}/{attch_id}', [EmpAtatchmentController::class, 'download'])->name('attchment.download');
    });


    Route::prefix('details')->group(function () {
        Route::resource('details', EmployeeDetilesController::class);
    });

    Route::prefix('salary')->group(function () {
        Route::get('add_salary', [SalariesController::class, 'index'])->name('add_salary');
        Route::post('search', [SalariesController::class, 'search'])->name('search_salary');
        Route::get('pay_salary', [SalariesController::class, 'pay'])->name('pay_salary');
        Route::get('print/{id}', [SalariesController::class, 'printSalary'])->name('print_salary');
        Route::resource('salary', SalariesController::class);
    });

    Route::get('/{name}', [AdminController::class, 'index']);
});
