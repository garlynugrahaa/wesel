<?php

namespace App\Http\Controllers;

use App\Models\Wesel;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }

    public function ajax()
    {
        if (request()->ajax()) {
            $Data = Wesel::latest()->get();

            return DataTables::of($Data)->addIndexColumn()->addColumn('date', function($item) {
                return Carbon::parse($item->datetime)->format('M d, Y');
            })->addColumn('time', function($item) {
                return Carbon::parse($item->datetime)->format('H:i') . ' WIB';
            })->rawColumns(['date', 'time'])->make(true);
        }
    }
}
