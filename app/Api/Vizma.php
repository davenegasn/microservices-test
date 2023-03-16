<?php 
namespace App\Api;
use App\Http\Resources\VizmaResource;

class Vizma extends APIBase {

    const provider = 'vizma';

    public function __construct()
    {
        parent::__construct(self::provider);
    }
    
    /**
     * Transfrom array into DTO
     *
     * @param array
     *
     * @return App\Http\Resources\VizmaResource
     */
    public static function toDTO($array)
    {
        return new VizmaResource($array);
    }


}