<?php
/*
The following function will strip the script name from URL
i.e.  http://www.something.com/search/book/fitzgerald will become /search/book/fitzgerald
*/


use Controllers\Ajax;

function getCurrentUri()
{
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    $uri = '/' . trim($uri, '/');
    return $uri;
}

$base_url = getCurrentUri();
$routes = array();
$routes = explode('/', $base_url);
foreach($routes as $route)
{
    if(trim($route) != '')
        array_push($routes, $route);
}

if (empty($routes[0])) {
    array_shift($routes);
};


/*
Now, $routes will contain all the routes. $routes[0] will correspond to first route.
For e.g. in above example $routes[0] is search, $routes[1] is book and $routes[2] is fitzgerald
*/




if($routes[0] == "controllers")
    {
        if($routes[1] == "ajax")
        {
            Ajax::getCoords();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sam Hughes - Professional Web Developer</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/minified/css/main.min.css" />
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>
</head>
<body>
    <?php require_once('elements/header.php'); ?>

    <main>
        <div class="center">
            <?php require_once('elements/bio.php'); ?>
            <?php require_once('elements/ajax_example.php'); ?>
        </div>
    </main>
</body>
<footer>
    <script type="text/javascript" src="js/minified/app.min.js"></script>
</footer>
</html>