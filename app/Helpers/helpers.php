<?php

// utilisateur 

function username(){
    return auth()->user()->name;
}
function useremail(){
    return auth()->user()->email;
}
function userlogin(){
    return auth()->user()->login;
}
function usertelephone(){
    return auth()->user()->telephone;
}
function userpassword(){
    return auth()->user()->password;
}

function getRole(){
    $rolesusers="";
    $i =0;
    foreach(auth()->User()->roles as $role){
        $rolesusers .=$role->nom;
        if ($i < sizeof(auth()->User()->roles ) -1 ){
            $rolesusers .= ",";
        }
        $i++;
    }
    return  $rolesusers;
}


// Menu 

function setMenuOpen($route){
    if (request()->route()->getName() === $route){
        return "menu-open";
    }
    return "";
}