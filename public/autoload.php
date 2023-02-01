<?php
    define("DS",DIRECTORY_SEPARATOR);
    define("ROOT_PATH",dirname(__DIR__).DS);
    define("APP",ROOT_PATH.'app'.DS);

    define("CORE",APP.'core'.DS);
    define("CONFIG",APP.'config'.DS);
    define("CONTROLLERS",APP.'controllers'.DS);
    define("MODELS",APP.'models'.DS);
    define("VIEWS",APP.'views'.DS);
    define("MESSAGES",APP.'messages'.DS);
    //db
    define("DATABASE",APP.'database'.DS);

    define("UPLOADS",ROOT_PATH.'public'.DS.'uploads'.DS);

    require_once(CONFIG.'config.php');
    // require_once(VIEWS.'alerts.php');


    $modules = [ROOT_PATH,APP,CORE,VIEWS,CONTROLLERS,MODELS,CONFIG,DATABASE,MESSAGES];
    set_include_path(get_include_path().PATH_SEPARATOR.implode(PATH_SEPARATOR,$modules));
    spl_autoload_register('spl_autoload',true);

    session_start();
    
    new App();
    
?>