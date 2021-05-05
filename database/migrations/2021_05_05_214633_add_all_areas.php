<?php

use App\Services\NewPostApiService\NewPostApiServiceInterface;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class AddAllAreas extends Migration
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
        $areas = $this->newPostApiService->getAreas();
        $insertData=[];
        foreach ($areas as $area){
            $insertData[] = [
                'ref' => $area->Ref,
                'areas_center' => $area->AreasCenter,
                'description' => $area->Description,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        \DB::table('areas')->insert($insertData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::table('areas')->truncate();
    }
}
