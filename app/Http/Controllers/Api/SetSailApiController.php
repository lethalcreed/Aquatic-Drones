<?php

namespace App\Http\Controllers\Api;

use App\Http\Handlers\SetSailApiHandler;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Http\Controllers\Controller;

class SetSailApiController extends Controller
{
    public function forecast()
    {
        $response = Curl::to('http://weerlive.nl/api/json-10min.php?locatie=Rotterdam')->asJson()->get();
        $forecast = ($response->liveweer)[0];

        return response()->json($forecast);
    }

    public function timeFrame(Request $request)
    {
        if ($request->all()) {
            $setSailApiHandler = new SetSailApiHandler();
            $timeFrame = $setSailApiHandler->timeFrame($request->all());

            return response()->json($timeFrame);
        } else {
            return response()->json(["error" => "There was an error in your request. Either the post body was empty or the format is wrong"]);
        }
    }
}
