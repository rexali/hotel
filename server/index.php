<?php
$request = $_SERVER['REQUEST_URI'];

$base = explode('?',$request);

switch ($base[0]) {

    // homepage routes, don't touch them
    case '/' :
        require __DIR__ . '/views/home.html';
        break;
		
    case '' :
        require __DIR__ . '/views/home.html';
        break;

    case '/home' :
        require __DIR__ . '/views/home.html';
        break;

    // product api routes, changes this examples, use the style method for the rest

    case '/products' :
        require __DIR__ . '/scripts/read_products';
        break;
   
    case '/products/1' :
        require __DIR__ . '/scripts/read_single_product';
        break;

    case '/products/1/delete' :
        require __DIR__ . '/scripts/delete_product';
        break;

    case '/products/1/edit' :
        require __DIR__ . '/scripts/edit_product';
        break;

    
	// page not found route
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.html';
        break;
}
