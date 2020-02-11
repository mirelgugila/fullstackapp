<?php

use FastRoute\Route;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Router;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->group(['middleware' => 'cors'], function () use ($router) {

    /** Information about this API */
    
    //     $router->get('/', function () {
    //     return 'Hello World';
    // });

    // $router->get('/api/user/{id}', ['uses' => 'UserController@show']);

    
    $router->group(['prefix' => 'api'], function () use ($router) {

        /**
         * person Routes
         */

        $router->get('persons', ['uses' => 'PersonController@showAllPersons']);

        $router->post('person', ['uses' => 'PersonController@create']);

        // $router->get('person/{id}', ['uses' => 'PersonController@showPerson']);
        
        $router->get('person/{id}/brand/{carBrand}', ['uses' => 'PersonController@showPersonWithCarBrand']);

        $router->get('person/{id}', ['uses' => 'PersonController@updatePerson']);

        /**
         * @Car Routes
         */
        

        $router->get('car/{id}', ['uses' => 'CarController@showCar']);

        $router->get('cars', ['uses' => 'CarController@showAllCars']);

        $router->post('car', ['uses' => 'CarController@create']);

        

      });
});



