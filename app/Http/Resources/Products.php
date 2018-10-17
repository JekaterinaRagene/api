<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Products extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        $jsnurl = 'https://www.sender.net/meals/';
        $json = file_get_contents($jsnurl);
        $menu = json_decode($json);
        return response()->json($menu);
    }
    
    
}
