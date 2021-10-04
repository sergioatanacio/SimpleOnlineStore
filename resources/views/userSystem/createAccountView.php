<?php
require viewPath("layouts/layoutsView");

$contendFa = function()
{
    return '<div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <br/>
            <h1>Note List</h1>
            <h3>Crear cuenta</h3>
            <form action="'. domain("createAccountProcess") .'" method="post">
                <p>Nombre</p>
                <input type="text" required="required" name="name" value="" class="form-control">
                <p>Correo</p>
                <input type="email" required="required" name="email" value="" class="form-control">
                <p>Pasword</p>
                <input type="password" required="required" name="password" value="" class="form-control">
                <br><br><br>
                <input type="submit" name="" value="Crear cuenta" class="form-control btn-primary">
            </form>
            <br>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 text-center">
            <a href="'. domain("") .'"><input type="submit" value="Iniciar sesión" class="form-control btn btn-outline-secondary"></a>
        </div>
    </div>
    <br><br><br>
    <br><br><br>
    ';
};


/**
 * Plantillas
 */
$title = fn()=>'Listick';

return $generalTemplateViewFa($title, fn()=> null, $contendFa);



