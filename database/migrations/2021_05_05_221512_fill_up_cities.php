<?php

use App\Services\NewPostApiService\NewPostApiServiceInterface;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillUpCities extends Migration
{
    /**
     * @var NewPostApiServiceInterface
     */
    private $newPostApiService;

    public function __construct()
    {
        $this->newPostApiService = app()->make(NewPostApiServiceInterface::class);
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cities = $this->newPostApiService->getCities();
        $insertData=[];
        foreach ($cities as $city){
            $insertData[] = [
                'ref' => $city->Ref,
                'area_ref' => $city->Area,
                'area_description' => $city->AreaDescription,
                'settlement_type_description' => $city->SettlementTypeDescription,
                'description' => $city->Description,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        \DB::table('cities')->insert($insertData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::table('cities')->truncate();
    }
}
