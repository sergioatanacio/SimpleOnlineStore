<?php

$productsForm = function($products, $folder, $class = 'col-12 col-sm-6 col-md-4 col-lg-3', $result = '') use (& $productsForm) : string
{
    if(!is_array($products) || $products == [])
    {
        return $result;
    } else {

        $beginning = lastElement($products);
        if ($beginning->id_products == 0 || $beginning->id_products == '0') {
            $recopilando = (is_object($beginning))
                ? '
                <div class="'. $class .'">
                    <form action="'. domain("readProduct") .'" method="GET">
                        <input type="hidden" name="id_mazo" value="'. $folder->id_mazo .'">
                        <input type="hidden" name="id_products" value="'. $beginning->id_products .'">
                        <input type="submit" value="' . $beginning->nombre_products . '" class="btn-primary form-control mb-3">
                    </form>
                </div>'
                : '' ;
        } else {
            $recopilando = (is_object($beginning))
                ? '
                    <div class="'. $class .'">
                        <form action="'. domain("byProductName") .'" method="GET">
                            <input type="hidden" name="id_mazo" value="'. $folder->id_mazo .'">
                            <input type="hidden" name="id_products" value="'. $beginning->id_products .'">
                            <input type="submit" value="' . $beginning->id_products . ': ' . $beginning->nombre_products . '" class="btn-primary form-control mb-3">
                        </form>
                    </div>'
                : '' ;
        }

        return $productsForm(popArray($products), $folder, $class, $recopilando . $result);
    }
};

$menuFirst = function($id_mazo = null)
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
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-lg-0">
                            <li class="nav-item blue-text">
                                <a href="'.domain("read").'"><input type="submit" class="btn form-control blue-text-button" value="Mis Folder"></a>
                            </li>
                            <li class="nav-item blue-text">
                                <a href="'.domain("logOut?logOut=false").'"><input type="submit" class="btn form-control blue-text-button" value="Cerrar sesión"></a>
                            </li>
                            <li class="nav-item">
                                <form class="d-flex" action="javascript:void(0)" method="POST">
                                    <input 
                                        class="form-control me-2" 
                                        type="text" 
                                        name="searchBox" 
                                        placeholder="Buscar" 
                                        aria-label="Search" 
                                        minlength="3" 
                                        autocomplete="off"                                       
                                        id="idSearchBox"
                                    >
                                    <input 
                                        class="btn btn-outline-success" 
                                        type="submit" 
                                        name="searchButton" 
                                        value="Buscar" 
                                        id="idSearchButton"
                                    >
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div>
           <div id="response" class="row justify-content text-center"></div>
           <script>
               function ajax() 
               {
                   let searchBoxValue = document.getElementById("idSearchBox").value.split(" ").join("+");
                   const http = new XMLHttpRequest();
                   const url  = "'. domain("searchProduct") .'?id_mazo='. $id_mazo .'&searchBox=" + searchBoxValue;
        
                   http.onreadystatechange = function () 
                   {
                       if (this.readyState == 4 && this.status == 200) 
                       {
                           console.log(url);
                           console.log(this.responseText);
                           // console.log(this.responseText);
                           document.getElementById("response").innerHTML = this.responseText;
                       }
                   }
        
                   http.open("GET", url);
                   http.send();
               }
        
               document.getElementById("idSearchButton").addEventListener("click", function () 
               {
                   ajax();
               });
           </script>
        </div>
    </div>    
    ';
};





