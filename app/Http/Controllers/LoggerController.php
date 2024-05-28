<?php

namespace App\Http\Controllers;

use App\Models\Wesel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class LoggerController extends Controller
{
    public function index()
    {
        $Title = "Logger";

        return view('master.logger.index', compact('Title'));
    }

    public function create()
    {
        $Title = "Create Logger";

        return view('master.logger.create', compact('Title'));
    }

    public function store(Request $Request)
    {
        try {
            Wesel::create([
                'area' => $Request->area,
            ]);

            Alert::success('Congrats', 'You\'ve Successfully Registered');
            return redirect()->route('logger.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('logger.index');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        try {
            Wesel::where('id', $id)->delete();

            Alert::success('Selamat', 'You\'ve Successfully Deleted');
            return redirect()->route('logger.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('logger.index');
        }
    }

    public function ajax()
    {
        if (request()->ajax()) {
            $Data = Wesel::latest()->get();

            return DataTables::of($Data)->addIndexColumn()->addColumn('date', function($item) {
                return Carbon::parse($item->datetime)->format('M d, Y');
            })->addColumn('time', function($item) {
                return Carbon::parse($item->datetime)->format('H:i') . ' WIB';
            })->addColumn('action', 'master.logger.action')->rawColumns(['date', 'time', 'action'])->make(true);
        }
    }
}
