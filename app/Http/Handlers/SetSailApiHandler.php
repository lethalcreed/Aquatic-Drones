<?php

namespace App\Http\Handlers;

use App\DronesTasks;
use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;

class SetSailApiHandler
{
    private $openWeatherMapApiKey = "b35a388d79a653530595435b1197c881";

    public function timeFrame(Array $postBody)
    {
        $dataVerification = $this->checkPostBody($postBody);
        if ($dataVerification) {
            return $dataVerification;
        }

        $task = DronesTasks::find($postBody['task_id']);
        if ($task) {
            //TODO rekening houden met drone settings
            //TODO get duration of task

            $forecastlist = $this->fetchWeatherForecast($postBody['latitude'], $postBody['longitude']);


            $taskStart = new Carbon($task->start_time);
            $taskEnd = new Carbon($task->end_time);
            if (Carbon::now()->diffInDays($taskStart) >= 0 && (Carbon::now()->addDays(5))->diffInDays($taskEnd) >= 0) {
                $taskEnd->addDay(1);
                $duration = 2;
                $difference = $taskStart->diffInHours($taskEnd);
                $optimalTimeFrame = Null;

                if ($difference > $duration) {
                    foreach ($forecastlist->list as $forecast) {
                        $forecastTime = Carbon::createFromTimeStamp($forecast->dt);
                        if ($forecastTime->gt($taskStart) && $taskEnd->diffInHours($forecastTime) > $duration && $forecastTime->lt($taskEnd)) {
                            if ($optimalTimeFrame) {
                                if ($forecast->wind->speed < $optimalTimeFrame->wind->speed) {
                                    $optimalTimeFrame = $forecast;
                                }
                            } else {
                                $optimalTimeFrame = $forecast;
                            }
                        }

                    }
                    return $optimalTimeFrame;
                } else {
                    $response['error'] = "Could not calculate optimal time frame. The duration of the task seems to be longer than the given time frame.";
                    $response['received_body'] = $postBody;
                    return $response;
                }
            } else {
                $response['error'] = "Could not calculate optimal time frame. The given time frame seems to be more than 5 days away.";
                $response['received_body'] = $postBody;
                return $response;
            }
        } else {
            $response['error'] = "No task could be found with the submitted id.";
            $response['received_body'] = $postBody;
            return $response;
        }
    }

    protected function checkPostBody($postBody)
    {
        switch ($postBody) {
            case !key_exists('task_id', $postBody) || !$postBody['task_id']:
                $response['error'] = "Missing or empty task_id. This must be the id of the task you are trying to get the optimal time frame for.";
                $response['received_body'] = $postBody;
                return $response;

            case !key_exists('latitude', $postBody) || !$postBody['latitude']:
                $response['error'] = "Missing or empty latitudinal coordinate. This must be passed during development. Eventually this will be redundant";
                $response['received_body'] = $postBody;
                return $response;

            case !key_exists('longitude', $postBody) || !$postBody['longitude']:
                $response['error'] = "Missing or empty longitudinal coordinate. This must be passed during development. Eventually this will be redundant";
                $response['received_body'] = $postBody;
                return $response;
        }
        return false;
    }

    protected function fetchWeatherForecast($latitude, $longitude)
    {
        $response = Curl::to('api.openweathermap.org/data/2.5/forecast?lat=' . $latitude . '&lon=' . $longitude . '&appid=' . $this->openWeatherMapApiKey)->asJson()->get();
        return $response;
    }
}