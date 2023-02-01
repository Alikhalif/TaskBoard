<?php

    if(isset($_COOKIE['success'])){
        echo '<div class="alert alert-success">'.$_COOKIE['success'].'</div>';
    }

    if(isset($_COOKIE['error'])){
        echo '<div class="alert alert-danger">'.$_COOKIE['error'].'</div>';
    }

?>