<?php
function call($controller, $action)
{
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'contact':
            require_once('models/contact.php');
            $controller = new ContactController;
            break;
        case 'address':
            require_once('models/address.php');
            $controller = new AddressController();
            break;
        case 'department':
            // we need the model to query the database later in the controller
            require_once('models/department.php');
            $controller = new DepartmentController();
            break;
    }

    $controller->{$action}();
}

// we're adding an entry for the new controller and its actions
$controllers = array('pages' => ['home', 'error'],
    'department' => ['index', 'show'],
    'contact' => ['index', 'show'],
    'address' => ['index', 'show', 'deleteaddress']);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
?>