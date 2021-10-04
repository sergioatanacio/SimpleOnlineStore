<?php

// UserController
Route::get('', 'UserController@login');
Route::get('login', 'UserController@login');
Route::get('logInProcess', 'UserController@logInProcess');
Route::get('createAccount', 'UserController@createAccount');
Route::get('createAccountProcess', 'UserController@createAccountProcess');

// HomeController
Route::get('dir', 'HomeController@index');

// AdministrativeController
Route::get('read', 'AdministrativeController@read');
Route::get('createFolder', 'AdministrativeController@createFolderView');
Route::get('createFolderProcess', 'AdministrativeController@createFolderProcess');
Route::get('updateFolder', 'AdministrativeController@updateFolderView');
Route::get('tableFolder', 'AdministrativeController@tableFolderView');

// ProductsSystemController
Route::get('readProduct', 'ProductsSystemController@readProductView');
Route::get('byProductName', 'ProductsSystemController@byProductNameView');
Route::get('addParent', 'ProductsSystemController@addParentView');
Route::get('addParentProcess', 'ProductsSystemController@addParentProcess');
Route::get('createProductContent', 'ProductsSystemController@createProductContentView');
Route::get('createProductContentProcess', 'ProductsSystemController@createProductContentProcess');
Route::get('update', 'ProductsSystemController@updateProduct');
Route::get('updateProcess', 'ProductsSystemController@updateProductProcess');
Route::get('removeChildren', 'ProductsSystemController@removeChildrenView');
Route::get('removeChildrenProcess', 'ProductsSystemController@removeChildrenProcess');
Route::get('searchProduct', 'ProductsSystemController@searchProducts');

// Session
Route::get('logOut', 'AdministrativeController@logOut');











