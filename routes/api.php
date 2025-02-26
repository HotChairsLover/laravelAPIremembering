<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

$baseApiNamespace = [
    'namespace' => 'App\Http\Controllers'
];
Route::group($baseApiNamespace, function () {
    Route::apiResource('companies', 'CompanyController')
        ->names('api.companies');
    Route::apiResource('departments', 'DepartmentController')
        ->names('api.departments');
    Route::apiResource('employees', 'EmployeeController')
        ->names('api.employees');
    Route::apiResource('roles', 'RoleController')
        ->names('api.roles');
});
