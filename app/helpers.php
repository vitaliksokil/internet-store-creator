<?php

function getShop(){
    return auth()->user()->shop;
}
