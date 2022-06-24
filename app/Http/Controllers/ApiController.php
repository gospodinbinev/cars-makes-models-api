<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CarMake;
use App\Models\CarModel;

class ApiController extends Controller
{
    public function getAllMakes() {
        $makes = CarMake::get()->toJson(JSON_PRETTY_PRINT);
        return response($makes, 200);
    }

    public function getModels($make_id) {
        if (CarModel::where('make_id', $make_id)->exists()) {
            $models = CarModel::where('make_id', $make_id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($models, 200);
        } else {
            return response()->json([
              "message" => "Car make not found"
            ], 404);
        }
    }
}
