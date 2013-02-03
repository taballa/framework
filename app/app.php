<?php

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel;

class LeapYearController
{
    public function indexAction($year)
    {
        if (is_leap_year($year)) {
            return new Response('Yep, this is a leap year!');
        }
 
        return new Response('Nope, this is not a leap year.');
    }
}

function render_template($request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(ROOT.'/app/%s.php', $_route);
 
    return new Response(ob_get_clean());
} 

function is_leap_year($year = null) {
    if (null === $year) {
        $year = date('Y');
    }
 
    return 0 == $year % 400 || (0 == $year % 4 && 0 != $year % 100);
}

$routes = new Routing\RouteCollection();
$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        // $foo will be available in the template
        $request->attributes->set('foo', 'bar');
 
        $response = render_template($request);
 
        // change some header
        $response->headers->set('Content-Type', 'text/plain');
 
        return $response;
    }
)));
$routes->add('bye', new Routing\Route('/bye', array(
    '_controller' => function($request){
        $response = render_template($request);

        return $response;
    }
)));
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    '_controller' => 'LeapYearController::indexAction',
)));
return $routes; 
return $routes;