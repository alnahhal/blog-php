<?php

// Define the current URL path and query string
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $url['path'];
$query = isset($url['query']) ? $url['query'] : '';

$routes = [
    '/' =>   'views/home.php',
    '/login' =>  'views/login.php',
    '/register-controller' =>  'controllers/registeration.php',
    '/register' =>  'views/register.php',

    '/profile' =>  'views/profile.php',
    '/login-controller' =>  'controllers/login.php',
    '/posts' =>  'views/posts/index_view.php',
    '/logout' =>  'controllers/logout.php',
    "/edit/post" => 'views/posts/edit_view.php',

    '/edit-post' => 'controllers/posts/edit.php',
    '/edit-comment' => 'controllers/comments/edit.php',
    '/delete-post' => 'controllers/posts/delete.php',
    '/delete-comment' => 'controllers/comments/delete.php',
    '/create-post' => 'controllers/posts/create.php',
    '/create-form' => 'views/posts/create_view.php',

    '/show-post' => 'views/posts/show_view.php',
    '/create-comment' => 'controllers/comments/create.php',
    '/comments' => 'views/comments/index_view.php',
    "/edit-profile-view" => 'views/edit_view_profile.php',
    "/edit-profile" => 'controllers/profile.php',

];


// Define a function to match the routes
function routeToController($path, $query, $routes)
{
    // Check if the route matches exactly
    if (array_key_exists($path, $routes)) {
        require $routes[$path];
        return;
    }

    // Check if any route matches with placeholders
    foreach ($routes as $route => $view) {
        // Split the route into path and query parts
        list($routePath, $routeQuery) = explode('?', $route, 2) + [null, null];

        // Check if the path part matches
        if ($routePath === $path) {
            // Check if the query part matches or if it's a wildcard route
            if ($routeQuery === null || $routeQuery === $query) {
                require $view;
                return;
            }
        }
    }

    // If no route matches, abort
    abort();
}

function abort($code = 404)
{
    // http_response_code($code);
    require "../app/views/{$code}.php";
    die();
}


// Call the route matching function
routeToController($path, $query, $routes);

















// $url = parse_url($_SERVER['REQUEST_URI'])['path'];

// $query = parse_url($_SERVER['REQUEST_URI'])['query'];


// function routeToController($url, $routes)
// {

//     if (array_key_exists($url, $routes)) {
//         require $routes[$url];
//     } else {
//         abort();
//     }
// }
