<?php 
namespace App\Api;
use App\Http\Resources\FortsocksResource;

class Fortsocks extends APIBase {

    const provider = 'fortsocks';

    public function __construct()
    {
        parent::__construct(self::provider);
    }
    
    /**
     * Transfrom array into DTO
     *
     * @param array
     *
     * @return App\Http\Resources\FortsocksResource
     */
    public static function toDTO($array)
    {
        return new FortsocksResource($array);
    }

}