<?php
  function call($controller, $action) {
    require_once('controllers/' . ucfirst($controller) . 'Controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
    }
    // appeler la fonction associé a la route
    $controller->{ $action }();
  }

  $controllers = array('pages' => ['home', 'error']);

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