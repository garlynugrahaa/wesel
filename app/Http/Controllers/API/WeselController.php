<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WeselResource;
use App\Models\Wesel;
use App\Models\WeselDetail;
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
                'area' => 'required',
                'voltage' => 'required',
                'current'   => 'required',
                'message'   => '',
                'category'   => 'required',
                'relay1' => 'required|boolean',
                'relay2' => 'required|boolean',
            ]);
    
            if ($Validator->fails()) {
                return response()->json($Validator->errors(), 422);
            }
            
            $Wesel = Wesel::where('area', $Request->area)->get()->first();

            if ($Wesel != NULL) {
                WeselDetail::create([
                    'wesel_id' => $Wesel->id,
                    'voltage' => $Request->voltage,
                    'current' => $Request->current,
                ]);

                $Wesel->update([
                    'voltage' => $Request->voltage,
                    'current' => $Request->current,
                    'message' => $Request->message,
                    'category' => $Request->category,
                    'relay1' => $Request->relay1,
                    'relay2' => $Request->relay2,
                ]);
            }

            return new WeselResource(true, 'You\'ve Successfully Registered', $Wesel);
        } catch (QueryException $e) {
            return new WeselResource(false, 'Error', $e);
        }
    }
}
