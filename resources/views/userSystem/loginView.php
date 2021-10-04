<?php
require viewPath("layouts/menuFirstView");
require viewPath("layouts/layoutsView");

$crearFa = fn() : string => "Crear cuenta";


$logo = function($id_mazo = null)
{
    return '
    <div class="row justify-content-center text-center">
        <div class="col-12">
            <nav class="navbar navbar-expand-md navbar-light" style="">
                <div class="container" id="menuForm">
    
                    <div class="nav-item blue-text">
                        <a href="'.domain("read").'"><input type="submit" class="btn form-control blue-text-button" value="Listick"></a>
                    </div>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    </div>
    
    ';
};



$contendFa = function($crear)
{
    return
    '<div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <h1 class="mt-5">Note List</h1>
            <p>Listas dentro de listas</p>
            <h3>Inicia Sesión</h3>
            <form method="post" action="'. domain("logInProcess") .'">
                <div class="mb-3">
                    <label for="" class="form-label">Correo</label>
                    <input type="email" required="required" name="email_users" autofocus value="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Pasword</label>
                    <input type="password" required="required" name="password_users" value="" class="form-control">
                </div>
                    </br>
                    <input type="submit" name="" class="form-control btn-primary mt-4" value="Iniciar sesión">
            </form>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 text-center">
        <a href="'. domain("createAccount") .'"><input type="submit" value="'. $crear() .'" class="form-control btn btn-outline-secondary"></a>
        </div>
    </div>
    ';
};


/**
 * Plantillas
 */
$titleFa = fn() : string =>'Listick' ;

$contend = fn() : string => $contendFa($crearFa);


return $generalTemplateViewFa($titleFa, $logo, $contend);



