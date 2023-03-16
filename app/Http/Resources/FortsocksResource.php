<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FortsocksResource extends JsonResource
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
            'id' => $this->id,
            'invoice_nr' => $this->{'invoice-nr'},
            'seller' => [
                'name' => $this->seller->name,
                'organisation_number' => $this->seller->{'organisation-number'},
            ],
            'buyer' => [
                'name' => $this->buyer->name,
                'organisation_number' => $this->buyer->{'organisation-number'}
            ],
            'rows' => $this->rows,
        ];
    }
}
