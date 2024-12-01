<?php

namespace Config;

// Crée une nouvelle instance de notre RouteCollection
$routes = Services::routes();

// Charge le fichier de système de routage par défaut
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
*
*Routes pour la table coprs
*
*/
$routes->group('corps', function ($routes) {
    $routes->get('/', 'CorpsController::index'); // Liste tous les enregistrements
    $routes->post('/', 'CorpsController::store'); // Crée un nouvel enregistrement
    $routes->get('(:num)', 'CorpsController::show/$1'); // Affiche un enregistrement spécifique (par ID)
    $routes->put('(:num)', 'CorpsController::update/$1'); // Met à jour un enregistrement spécifique (par ID)
    $routes->delete('(:num)', 'CorpsController::delete/$1'); // Supprime un enregistrement spécifique (par ID)
});


/*
*
*Routes pour la table utilisateur
*
*/
$routes->group('users', function ($routes) {
    $routes->get('/', 'UsersController::Affichage_utilisateur'); 
    $routes->post('/', 'UsersController::store'); 
    $routes->get('(:num)', 'UsersController::show_utilisateur/$1'); 
    $routes->delete('(:num)', 'UsersController::supprimer_User/$1'); 
});
/*
*
*Routes pour la table Localisation 
*
*/

$routes->group('localisation', function ($routes) {
    $routes->get('/', 'LocalisationController::affichageLocalisation'); 
    $routes->post('/', 'LocalisationController::ajout_localisation'); 
    $routes->get('(:num)', 'LocalisationController::showLocalisation/$1'); 
    $routes->delete('(:num)', 'LocalisationController::deleteLocalisation/$1'); 
});


/*
*
*Routes pour la table direction 
*
*/

$routes->group('direction', function ($routes) {
    $routes->get('/', 'DirectionController::affichageDirection'); 
    $routes->post('/', 'DirectionController::Ajout_Direction'); 
    $routes->get('(:num)', 'DirectionController::showDirection/$1'); 
    $routes->delete('(:num)', 'DirectionController::deleteDirection/$1'); 
});

/*
*
*Routes pour la table agent
*
*/

$routes->group('agent', ['filter' => 'cors'], function ($routes) {
    $routes->get('/', 'AgentController::affichageAgent'); 
    $routes->post('/', 'AgentController::Ajout_Agent'); 
    $routes->get('(:num)', 'AgentController::showAgent/$1'); 
    $routes->delete('(:num)', 'AgentController::deleteAgent/$1'); 
});
// Route dédiée pour gérer les requêtes OPTIONS (CORS)

/*
 *routes par defaut
 */
$routes->get('/', 'Home::index'); // Exemple de route par défaut pour la page d'accueil


if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
