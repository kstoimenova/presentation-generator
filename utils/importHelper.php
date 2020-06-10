<?php

function getValueByKeyInSlide($key, $slide){
    $value;
    if(array_key_exists($key, $slide)){
        $value = $slide[$key];
    } else {
        $value = "NULL";
    }

    return $value;
}