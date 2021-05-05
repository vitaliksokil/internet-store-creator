<?php


namespace App\Services\NewPostApiService;


use GuzzleHttp\Client;

class NewPostApiService implements NewPostApiServiceInterface
{
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $apiKey;
    /**
     * @var string
     */
    private $endPoint;
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->apiKey = config('app.new_post_api_key');
        $this->endPoint = 'https://api.novaposhta.ua/v2.0/json/';
        $this->client = new Client();
    }


    public function getAreas()
    {
        $response = $this->client->request('GET',$this->endPoint, [
            'json' => [
                "apiKey" => $this->apiKey,
                "modelName" => "Address",
                "calledMethod" => "getAreas",
//                "methodProperties" => []
            ]
        ]);
        return json_decode($response->getBody())->data;
    }
    public function getCities(){
        $response = $this->client->request('GET',$this->endPoint, [
            'json' => [
                "apiKey" => $this->apiKey,
                "modelName" => "Address",
                "calledMethod" => "getCities",
            ]
        ]);
        return json_decode($response->getBody())->data;
    }

    public function getWarehouses($page)
    {
        $response = $this->client->request('GET',$this->endPoint, [
            'json' => [
                "apiKey" => $this->apiKey,
                "modelName" => "AddressGeneral",
                "calledMethod" => "getWarehouses",
                "methodProperties" => [
                    'Page' => $page,
                    'Limit' => 500
                ]
            ]
        ]);
        return json_decode($response->getBody())->data;
    }
}
