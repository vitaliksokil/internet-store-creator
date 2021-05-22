<?php


namespace App\Services\NewPostApiService;


interface NewPostApiServiceInterface
{
    public function getAreas();
    public function getCities();
    public function getWarehouses($page);
}
