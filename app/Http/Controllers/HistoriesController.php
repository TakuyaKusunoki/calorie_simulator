<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\History;

class HistoriesController extends Controller
{
    // public function store(Request $request)
    // {
    //     $request->create([
    //         'user_name' => $request->user_name,
    //         'user_id' => $request->user_id,
    //         'start_date' => $request->start_date,
    //         'end_date' => $request->endsection,
    //         'calorie' => $request->calorie,
    //     ]);
        
    //     return redirect('#');
    // }
    
    public function destroy($id)
    {
        $history = History::find($id);
        $history->delete();
        
        return redirect()->back();
    }
    
    public function index()
    {
        $histories = History::all();
        
        return view('histories.index', [
            'histories' => $histories,
        ]);
    }
}
