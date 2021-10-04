<?php
require viewPath("layouts/menuFirstView");


$contend = function($searchProducts) use ($productsForm)
{
    return $productsForm($searchProducts['searchProducts'], $searchProducts['folder'] );
};

return $contend($model);


// return $generalTemplateViewFa($title, $menuFirst, $contend);

