<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->get('/', 'Main::index/$1');
//$routes->get('obce/(:num)', 'Main::obce/$1/$2');
$routes->get('/', 'Main::bundesIndex');
$routes->get('stanice/(:num)', 'Main::stanice/$1');
$routes->get('staniceDetaily/(:num)', 'Main::staniceDetaily/$1');
$routes->get('strankovaneData/(:num)/(:num)', 'Main::strankovaneData/$1/$2');
$routes->get('spolkoveZeme/(:num)', 'Main::spolkoveZeme/$1');

$routes->post('stanice/smazat-data/(:num)', 'Main::smazatData/$1');


