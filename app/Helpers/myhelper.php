<?php
use Illuminate\Support\Facades\Hash;

function pr($arr){
echo "<pre>";
print_r($arr);
die();
}
function prx($arr){
echo "<pre>";
print_r($arr);
}

function hashmake($var){
    return Hash::make($var);
}


?>
