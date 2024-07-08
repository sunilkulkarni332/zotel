<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Holiday;

class PublicApiController extends Controller
{
    /**View All Holidays At screen */
    public function getHolidays()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://calendarific.com/api/v2/holidays', [
            'query' => [
                'api_key' => '4U7uBSRJyq6loXlAJzCR2zU3f9AHapkz', // Replace with your actual API key
                'country' => 'IN', // Country code for India
                'year' => date('Y'), // Current year
            ]
        ]);

        $holidays = json_decode($response->getBody()->getContents());

        return view('holidays.calenderViewInTable', ['holidays' => $holidays->response->holidays]);
    }

    /**Add Holiday to system */
    public function insertHolidays()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://calendarific.com/api/v2/holidays', [
            'query' => [
                'api_key' => '4U7uBSRJyq6loXlAJzCR2zU3f9AHapkz', // Replace with your actual API key
                'country' => 'IN', // Country code for India
                'year' => date('Y'), // Current year
            ]
        ]);

        $holidays = json_decode($response->getBody()->getContents());
        $holidays = $holidays->response->holidays;
        foreach ($holidays as $holiday){
            Holiday::create([
                'name' => $holiday->name,
                'date' => $holiday->date->iso,
                'type' => $holiday->type[0]
            ]);
        }                                                    
        return redirect()->route('getHolidays');
    }

    public function displayPage(){
        return view('holidays.calendar');
    }

    /**Show case holidays on calender */
    public function showCalender()
    {
        $events = Holiday::all()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->name,
                'start' => $event->date,
                'type' => $event->type,
            ];
        }); // Fetch all events from the database

        return response()->json($events); // Return events as JSON
    }
}
