<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartLocation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request); 
        return [
            'outlet_id'     => $this->outlet_id,
            'product_id'    => $this->product_id,
            'description'   => $this->description,
            'short_code'    => $this->short_code,
            'price'         => (double)$this->retail,
            'postmix'       => $this->postmix,
            'is_food'       => $this->is_food,
            'prepartno'     => $this->prepartno,
            'ssbuffer'      => $this->ssbuffer,
            'part_number'   => $this->part_number
        ];
    }
}
