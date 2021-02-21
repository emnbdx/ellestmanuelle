<?php
	if(!session_id()) @session_start();

    // composer autoloader
    require 'vendor/autoload.php';

	// project autoloader
    spl_autoload_register(function ($className) {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        if (file_exists($fileName)){
            require $fileName;
        }
    });

	$router = new AltoRouter();

	$repository = new Repositories\Repository();
	$contactController = new Controllers\ContactController();
	$creationController = new Controllers\CreationController($repository);
	$staticController = new Controllers\StaticController($repository);

	$adminRepository = new Repositories\AdminRepository();
	$fileUploader = new Repositories\FileUploader();
	$adminController = new Controllers\AdminController($adminRepository, $fileUploader);

	// front route
	$router->map('GET', '', 'StaticController#index');
    $router->map('GET', '/', 'StaticController#index');
    $router->map('GET', '/ateliers', 'StaticController#ateliers');
    $router->map('GET', '/illustrations', 'StaticController#illustrations');
    $router->map('GET', '/qui-suis-je', 'StaticController#whoami');
    $router->map('GET', '/boutique', 'StaticController#shop');
    $router->map('GET', '/contact', 'ContactController#index');
    $router->map('POST', '/contact', 'ContactController#send');
	$router->map('GET', '/creations-personnelles', 'CreationController#index');

	// bo route
	$router->map('GET', '/admin/login', 'AdminController#login');
	$router->map('POST', '/admin/login', 'AdminController#login');
	$router->map('GET', '/admin/logout', 'AdminController#logout');
	$router->map('GET', '/admin', 'AdminController#index');
	$router->map('GET', '/admin/creations', 'AdminController#creationList');
	$router->map('GET', '/admin/creation/add', 'AdminController#creationForm');
	$router->map('POST', '/admin/creation/add', 'AdminController#addOrUpdateCreation');
	$router->map('GET', '/admin/creation/[i:id]/update', 'AdminController#creationForm');
	$router->map('POST', '/admin/creation/[i:id]/update', 'AdminController#addOrUpdateCreation');
	$router->map('GET', '/admin/creation/[i:id]/delete', 'AdminController#deleteCreation');

	$router->map('GET', '/admin/documents', 'AdminController#documentList');
	$router->map('GET', '/admin/document/add', 'AdminController#documentForm');
	$router->map('POST', '/admin/document/add', 'AdminController#addDocument');
	$router->map('GET', '/admin/document/[i:id]/delete', 'AdminController#deleteDocument');

	$router->map('GET', '/admin/pages', 'AdminController#pageList');
	$router->map('GET', '/admin/page/[i:id]/update', 'AdminController#pageForm');
	$router->map('POST', '/admin/page/[i:id]/update', 'AdminController#updatePage');

	$router->map('GET', '/admin/techniques', 'AdminController#techniqueList');
	$router->map('GET', '/admin/technique/add', 'AdminController#techniqueForm');
	$router->map('POST', '/admin/technique/add', 'AdminController#addOrUpdateTechnique');
	$router->map('GET', '/admin/technique/[i:id]/update', 'AdminController#techniqueForm');
	$router->map('POST', '/admin/technique/[i:id]/update', 'AdminController#addOrUpdateTechnique');
	$router->map('GET', '/admin/technique/[i:id]/delete', 'AdminController#deleteTechnique');

	$router->map('GET', '/admin/themes', 'AdminController#themeList');
	$router->map('GET', '/admin/theme/add', 'AdminController#themeForm');
	$router->map('POST', '/admin/theme/add', 'AdminController#addOrUpdateTheme');
	$router->map('GET', '/admin/theme/[i:id]/update', 'AdminController#themeForm');
	$router->map('POST', '/admin/theme/[i:id]/update', 'AdminController#addOrUpdateTheme');
	$router->map('GET', '/admin/theme/[i:id]/delete', 'AdminController#deleteTheme');

	$match = $router->match();
    
    if(is_array($match)) {

		list($controller, $action, $auth) = array_pad(explode('#', $match['target']), 3, null);
		$ctrl = NULL;
        $bo = false;
		if($controller == "StaticController") {
			$ctrl = $staticController;
		} else if ($controller == "ContactController") {
			$ctrl = $contactController;
		} else if ($controller == "CreationController") {
			$ctrl = $creationController;
		} else if ($controller == "AdminController") {
            $bo = true;
			$ctrl = $adminController;
		}

        list($type, $view, $data) = $ctrl->{$action}($match['params']);

        if(!$bo) {
            if($type == 'json') {
                header('Content-Type: application/json');
                echo $data;
            } else {
                $content = __DIR__ . '/Views/' . $view . '.phtml';
                $title = getTitle($view ?? $action);
                require __DIR__ . "/Views/shared/layout.phtml";
            }
        } else {
            $logged = isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true;
            if(!$logged && $view != 'login') {
                header('location: /admin/login');
                exit;
            }

            if($logged && $view == 'login') {
                header('location: /admin');
                exit;
            }

            $content = __DIR__ . '/Views/bo/' . $view . '.phtml';
            require __DIR__ . "/Views/shared/layout-bo.phtml";

        }
    }
 
	function getTitle($action) 
    {
        $title = "Ellestmanuelle | ";
        switch ($action)
        {
            case 'index' :
                $title .= "Accueil : créations artistiques et artisanales / illustrations / interventions ateliers";
                break;
            case 'ateliers' :
                $title .= "Animations d'ateliers créations";
                break;
            case 'contact' :
                $title .= "Contact";
                break;
            case 'creations-personnelles' :
                $title .= "Création Personnelles";
                break;
            case 'illustrations' :
                $title .= "Réalisation d'illustrations";
                break;
            case 'whoami' :
                $title .= "Qui suis-je ?";
                break;
            case 'shop' :
                $title .= "Boutique";
                break;
            default :
                $title .= "404";
                break;
        }

     	return $title;
    }

?>