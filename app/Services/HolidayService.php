<?php

namespace App\Services;

use GuzzleHttp\Client;

class HolidayService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchHolidays($year, $country)
    {
        
        $url = "https://holidayapi.com/v1/holidays?pretty&key=89948bf4-ed99-495f-8d41-3226b5a796ee&country=$country&year=$year";
        $response = $this->client->get($url);

        // $response = $this->client->get('https://holidayapi.com/v1/holidays', [
        //     'query' => [
                
        //         'api' => env('HOLIDAY_API_KEY'),
        //         'country' => $country,
        //         'year' => $year
        //         ]
        //     ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
