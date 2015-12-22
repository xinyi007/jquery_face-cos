<?php

// >= php 5.3.0
function classLoader($class){
    $dir = dirname(__FILE__);
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

 if (file_exists($class)) {
        include($dir.DIRECTORY_SEPARATOR.$class); 
    }

    
};
spl_autoload_register('classLoader');


