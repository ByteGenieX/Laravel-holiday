<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HolidayService;
use App\Models\Holiday;

class HolidayController extends Controller
{
    protected $holidayService;

    public function __construct(HolidayService $holidayService)
    {
        $this->holidayService = $holidayService;
    }

    public function index()
    {
        return view('holidays.index', ['holidays' => Holiday::all()]);
    }

    public function fetchHolidays(Request $request)
    {
        $year = $request->input('year');
        $country = $request->input('country');

        $holidays = $this->holidayService->fetchHolidays($year, $country);
        $response=$holidays;

        $holidayData = [];
        if (isset($response['holidays']) && is_array($response['holidays'])) {
            foreach ($response['holidays'] as $holiday) {
                if (isset($holiday['name']) && isset($holiday['date'])) {
                    $holidayData[] = [
                        'name' => $holiday['name'],
                        'date' => $holiday['date']
                    ];
                }
            }
        }
 
     
        
        Holiday::truncate();
        
        foreach ($holidayData as $holiday) 
        {

            Holiday::updateOrCreate(
            ['date' => $holiday['date']],
            ['name' => $holiday['name']]
            );
        }
           return redirect()->route('holidays.index');
    }
}