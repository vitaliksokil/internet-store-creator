<?php

use App\Services\NewPostApiService\NewPostApiServiceInterface;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillUpWarehousesTable extends Migration
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
        $page = 1;
        do{
            $cities = $this->newPostApiService->getWarehouses($page);
            $insertData=[];
            foreach ($cities as $city){
                $insertData[] = [
                    'ref' => $city->Ref,
                    'description' => $city->Description,
                    'short_address' => $city->ShortAddress,
                    'city_ref' => $city->CityRef,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            \DB::table('warehouses')->insert($insertData);
            $page++;
        }while($cities !== []);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::table('warehouses')->truncate();
    }
}
