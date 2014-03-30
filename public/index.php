<?php


error_reporting(E_ALL);

try {

    // --------------------------------------------------------------------
    // Load Composer
    // --------------------------------------------------------------------
    $autoload_file = "../vendor/autoload.php";
    if (!file_exists($autoload_file)) {
        throw new \Exception('$ composer install');
    }

    require_once $autoload_file;

    // --------------------------------------------------------------------
    // Read the configuration
    // --------------------------------------------------------------------
    $config = include __DIR__ . "/../app/config/config.php";
    $api    = include __DIR__ . "/../app/config/api.php";

    // --------------------------------------------------------------------
    // Load Live Files
    // --------------------------------------------------------------------
    $live_config_file = "../app/config/live-config.php";
    $live_api_file = "../app/config/live-api.php";

    if (file_exists($live_config_file)) {
        $config = require_once $live_config_file;
    }

    if (file_exists($live_api_file)) {
        $api = require_once $live_api_file;
    }

    // --------------------------------------------------------------------
    // Read auto-loader
    // --------------------------------------------------------------------
    include __DIR__ . "/../app/config/loader.php";

    // --------------------------------------------------------------------
    // Read services
    // --------------------------------------------------------------------
    include __DIR__ . "/../app/config/services.php";

    // --------------------------------------------------------------------
    // Handle the request
    // --------------------------------------------------------------------
    $application = new \Phalcon\Mvc\Application($di);
    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage();
}

// End of File
// --------------------------------------------------------------------
