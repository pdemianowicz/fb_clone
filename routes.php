<?php

$router->get('/', 'HomeController@index');
$router->get('/loadComments', 'HomeController@loadComments');
$router->post('/setPost', 'HomeController@addPost');

$router->post('/setComment', 'HomeController@setComment');
$router->post('/setLike', 'HomeController@setLike');

$router->delete('/deletePost', 'HomeController@deletePost');
$router->post('/deleteComment', 'HomeController@deleteComment');

$router->get('/profile', 'ProfileController@index');
$router->post('/avatar', 'ProfileController@avatar');
// $router->post('/setAvatar', 'ProfileController@deleteAvatar');
$router->post('/bg', 'ProfileController@bg');

$router->get('/register', 'registration/create.php');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'SessionController@index');
$router->post('/session', 'SessionController@store');
$router->delete('/session', 'SessionController@destroy');
