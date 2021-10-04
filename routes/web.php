<?php
use App\Helpers\Route;
// UserController
Route::get('login', 'AdministrativeController@login');
Route::get('createAccount', 'AdministrativeController@createAccount');
Route::get('createAccountProcess', 'AdministrativeController@createAccountProcess');

// HomeController
// RouteHelpers::get('dir', 'HomeController@index');
Route::get('dir', 'UserController@login');

// FolderController
Route::get('bodyFolderView', 'FolderController@bodyFolderView');

// AdministrativeController
Route::get('', 'AdministrativeController@login');
Route::get('logInProcess', 'AdministrativeController@logInProcess');
Route::get('createFolder', 'AdministrativeController@createFolder');
Route::get('createFolderProcess', 'AdministrativeController@createFolderProcess');
Route::get('updateFolder', 'AdministrativeController@updateFolderView');
Route::get('tableFolder', 'AdministrativeController@tableFolder');

// ProductController
Route::get('readProduct', 'ProductController@readProduct');
Route::get('byProductName', 'ProductController@byProductName');
Route::get('addParent', 'ProductController@addParent');
Route::get('addParentProcess', 'ProductController@addParentProcess');
Route::get('createProductContent', 'ProductController@createProductContent');
Route::get('createProductContentProcess', 'ProductController@createProductContentProcess');
Route::get('updateProduct', 'ProductController@updateProduct');
Route::get('updateProductProcess', 'ProductController@updateProductProcess');
Route::get('removeChildren', 'ProductController@removeChildren');
Route::get('removeChildrenProcess', 'ProductController@removeChildrenProcess');

// Session
Route::get('logOut', 'AdministrativeController@logOut');








