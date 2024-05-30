<?php

namespace App\Http\Controllers;

use App\Models\Wesel;
use App\Models\WeselDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $Title = "Dashboard";
        $Machine1 = Wesel::latest()->where('area', '=', 'Machine 1')->limit(1)->get();
        $Machine2 = Wesel::latest()->where('area', '=', 'Machine 2')->limit(1)->get();

        return view('master.dashboard.index', compact('Title', 'Machine1', 'Machine2'));
    }

    public function chartMachine1()
    {
        $Wesel = Wesel::where('area', 'Machine 1')->get()->first();
        $Monitoring = WeselDetail::where('wesel_id', $Wesel->id)->get();

        $CMachine1 = [];
        foreach ($Monitoring as $Data) {
            $CMachine1[] = [
                'label' => Carbon::parse($Data->datetime)->format('M d, Y H:i'),
                'voltage' => $Data->voltage,
                'current' => $Data->current,
            ];
        }

        return response()->json($CMachine1);
    }

    public function chartMachine2()
    {
        $Wesel = Wesel::where('area', 'Machine 2')->get()->first();
        $Monitoring = WeselDetail::where('wesel_id', $Wesel->id)->get();

        $CMachine2 = [];
        foreach ($Monitoring as $Data) {
            $CMachine2[] = [
                'label' => Carbon::parse($Data->datetime)->format('M d, Y H:i'),
                'voltage' => $Data->voltage,
                'current' => $Data->current,
            ];
        }

        return response()->json($CMachine2);
    }
}
