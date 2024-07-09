<?php

use Abno\Abno360\Abno360Service;
use Aman5537jains\AbnCms\Lib\AbnCms;
use Aman5537jains\AbnCmsAdminTheme\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/cpadmin/login",function(){

    return AbnCms::getActiveTheme("BACKEND_ACTIVE_THEME")->setLayout("login")->render(["abno360URL"=>""]);
})->middleware("web")->name("admin-login");

Route::post("/cpadmin/post-login",[AuthController::class,"postAdminLogin"])->middleware("web")->name("admin-post-login");


Route::group(["middleware"=>["web","auth"],"prefix"=>"cpadmin"],function(){
    Route::any("/dashboard",function(){
        return  AbnCms::getActiveTheme("BACKEND_ACTIVE_THEME")->render();
    })->name("AbnCmsAdminTheme-dashboard");
    Route::get("/change-password","\Aman5537jains\AbnCmsAdminTheme\Controllers\AuthController@changePassword")->name("AbnCmsAdminTheme-change-password");
    Route::post("/change-password","\Aman5537jains\AbnCmsAdminTheme\Controllers\AuthController@updatePassword")->name("AbnCmsAdminTheme-update-password");

    Route::get("/logout", [AuthController::class,"getAdminLogout"])->name("AbnCmsAdminTheme-admin-logout");



});


