<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $data = [];
        \Arr::set($data,'id', $this->id);
        \Arr::set($data,'firstname', \Str::upper($this->firstname));
        \Arr::set($data,'lastname', \Str::title($this->lastname));
        \Arr::set($data,'email', $this->email);
        \Arr::set($data,'legal_counsel', $this->legal_counsel);
        \Arr::set($data,'dob', $this->dob->format('d M Y'));
        \Arr::set($data,'profile_date', $this->profile_date->format('d M Y'));
        \Arr::set($data,'passport', $this->passport);
        \Arr::set($data,'image', $this->image);
        \Arr::set($data,'customer_cases_count', $this->customer_cases_count);
        \Arr::set($data,'cases', $this->customer_cases);


        return $data;
    }
}
