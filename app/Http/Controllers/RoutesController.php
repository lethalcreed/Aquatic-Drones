<?php

namespace App\Http\Controllers;

use App\Routes;
use App\RoutesAnchorpoints;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function createRoute(Request $request)
    {
        if ($request->all()) {
            $dataVerification = $this->checkRoutePostBody($request->all());
            if ($dataVerification) {
                return $dataVerification;
            }

            $route = new Routes();
            $route->fill($request->all());
            $route->save();

            foreach (json_decode($request->coordinates) as $coordinate) {
                $anchorpoint = new RoutesAnchorpoints();
                $anchorpoint->routes_id = $route->id;
                $anchorpoint->latitude = $coordinate[0];
                $anchorpoint->longitude = $coordinate[1];
                $anchorpoint->save();
            }

            $response = ['message' => 'The route has been created', 'routes_id' => $route->id];
            return response($response);
        } else {
            return response()->json(["error" => "There was an error in your request. Either the post body was empty or the format is wrong"]);
        }
    }

    public function getRoute($routeId)
    {
        $route = Routes::with('anchorpoints')->find($routeId);
        return $route;
    }

    public function updateRoute(Request $request)
    {
        if ($request->all()) {
            $dataVerification = $this->checkRoutePostBody($request->all(), true);
            if ($dataVerification) {
                return $dataVerification;
            }

            //Update the route if changes have been made
            $route = Routes::find($request->routes_id);
            $route->fill($request->all());
            $route->save();

            //Remove all the old anchorpoints
            RoutesAnchorpoints::where('routes_id', $request->routes_id)->delete();

            //Link the new anchorpoints
            foreach (json_decode($request->coordinates) as $coordinate) {
                $anchorpoint = new RoutesAnchorpoints();
                $anchorpoint->routes_id = $route->id;
                $anchorpoint->latitude = $coordinate[0];
                $anchorpoint->longitude = $coordinate[1];
                $anchorpoint->save();
            }

            $response = ['message' => 'The route has been updated'];

            return response()->json($response);
        } else {
            return response()->json(["error" => "There was an error in your request. Either the post body was empty or the format is wrong"]);
        }
    }

    public function deleteRoute($routeId)
    {
        Routes::find($routeId)->delete();
        RoutesAnchorpoints::where('routes_id', $routeId)->delete();

        $response = ['message' => 'The route has been deleted'];
        return response()->json($response);
    }

    protected function checkRoutePostBody($postBody, $update = false)
    {
        if ($update) {
            if (!key_exists('routes_id', $postBody) || !$postBody['routes_id']) {
                $response['error'] = "Missing or empty routes_id. This must be the id of the route you want to update.";
                $response['received_body'] = $postBody;
                return $response;
            }
        } else {
            if (!key_exists('name', $postBody) || !$postBody['name']) {
                $response['error'] = "Missing or empty name. The route must have a name for later reference.";
                $response['received_body'] = $postBody;
                return $response;
            }
        }
        if (!key_exists('coordinates', $postBody) || !$postBody['coordinates']) {
            $response['error'] = "Missing or empty coordinates array. This must be an array of the coordinates you want to link to this route. The array must be an valid JSON array in the following format [['lat', 'long'],['lat', 'long']]";
            $response['received_body'] = $postBody;
            return $response;
        }
        if (!is_array(json_decode($postBody['coordinates']))) {
            $response['error'] = "The array must be an valid JSON array in the following format [['lat', 'long'],['lat', 'long']]";
            $response['received_body'] = $postBody;
            return $response;
        }

        return false;
    }
}
