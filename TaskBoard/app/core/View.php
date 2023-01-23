<?php

class View
{
    public static function load($view_name,$view_data=[])
    {
        $file = VIEWS.$view_name.'.php';
        if(file_exists($file))
        {
            extract($view_data);
            require($file);
        }
        else{
            echo 'This view : '.$view_name.'dose not exist';
        }
    }
}

?>