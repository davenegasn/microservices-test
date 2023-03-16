<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VizmaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'                => $this->Id,
            'currencyCode'      => $this->CurrencyCode,
            "totalAmount"       => $this->TotalAmount,
            "totalVatAmount"    => $this->TotalVatAmount,
            "customerId"        => $this->CustomerId,
        ];
    }
}
