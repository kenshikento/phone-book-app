<?php

namespace App\Support;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class ApiForceGateWay
{
    const URL = 'http://www.mocky.io/v2/581335f71000004204abaf83';

    /**
     * Get the data
     * @return json
     */
    public function getData1() : Array 
    {
        $response = Http::get(static::URL);

        /*if (!$response->succesful()) {
            throw new Exception('Issue with Api');
        }*/

        $items = $response->json();

        return $items;
    }

    public function getData()
    {
        $json = 
    [
    "contacts" => [
        [
            "name"=> "Oleta Level",
            "phone_number"=> "+442032960159",
            "address"=> "10 London Wall, London EC2M 6SA, UK"
        ]
    , 
        [
            "name"=> "Maida Level",
            "phone_number"=> "+442032960899",
            "address"=> "Woodside House, 94 Tockholes Rd, Darwen BB3 1LL, UK"
        ]
    ,
        [ 
            "name"=> "Lia Pigford",
            "phone_number"=> "+442032960182",
            "address"=> "23 Westmorland Cl, Darwen BB3 2TQ, UK"
        ]
    , 
        [
            "name"=> "Ghislaine Darden",
            "phone_number"=> "+442032960427",
            "address"=> "20-24 Knowlesly Rd, Darwen BB3 2NE, UK"
        ]
    , 
        [
            "name"=> "Jana Spitler",
            "phone_number"=> "+442032960370",
            "address"=> "4 St Lucia Cl, Darwen BB3 0SJ, UK"
        ]
    , 
        [
            "name"=> "Dolly Detweiler",
            "phone_number"=> "+442032960977",
            "address"=> "18 Johnson Rd, Darwen BB3, UK"
        ]
    ,
        [ 
            "name"=> "Stanley Vanderhoof",
            "phone_number"=> "+442032960000",
            "address"=> "17 Anchor Ave, Darwen BB3 0AZ, UK"
        ]
    ,
        [ 
            "name"=> "Adan Milian",
            "phone_number"=> "+442032960011",
            "address"=> "20 Ellerbeck Rd, Darwen BB3 3EX, UK"
        ]

    ]
]
    ; 

        return $json;
    }
}
