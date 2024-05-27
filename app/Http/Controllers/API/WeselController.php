<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeselResource;
use App\Models\Wesel;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class WeselController extends Controller
{
    public function store(Request $Request)
    {
        try {
            $Validator = FacadesValidator::make($Request->all(), [
                'voltage' => 'required',
                'current'   => 'required',
                'message'   => 'required',
                'category'   => 'required',
                'area' => 'required',
            ]);
    
            if ($Validator->fails()) {
                return response()->json($Validator->errors(), 422);
            }

            $Wesel = Wesel::create([
                'datetime' => Carbon::now(),
                'voltage' => $Request->voltage,
                'current' => $Request->current,
                'message' => $Request->message,
                'category' => $Request->category,
                'area' => $Request->area,
            ]);

            return new WeselResource(true, 'You\'ve Successfully Registered', $Wesel);
        } catch (QueryException $e) {
            
        }
    }
}
