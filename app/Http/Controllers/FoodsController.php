<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Food;
use App\History;

class FoodsController extends Controller
{
    public function index ()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $foods = $user->foods()->orderBy('eat_date', 'desc')->paginate(50);
            
            $data = [
                'user' => $user,
                'foods' => $foods,
            ];
            //$data += $this->counts($user);
            return view('users.show', $data);
        // } elseif ($user->type == "root") {
        //     $id = $this->user()->id;
        //     $user = user()->id = $id;
        //     $foods = $user->foods()->orderBy('eat_date', 'desc')->paginate(100);
            
        //     $data = [
        //         'user' => $user,
        //         'foods' => $foods,
        //     ];
        //     $data += $this->counts($user);
        //     return view('users.show', $data);
        } else {
            return view('welcome');
        }
    }
    
    // public function root($id)
    // {
        
    // }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'calorie' => 'required|max:191',
            'eat_date' => 'required|max:191',
        ]);
        
        $request->user()->foods()->create([
            'name' => $request->name,
            'calorie' => $request->calorie,
            'eat_date' => $request->eat_date,
        ]);
        
        return redirect('/');
        
        // $food = new Food;
        // $food->name = $request->name;
        // $food->calorie = $request->calorie;
        // $food->eat_date = $request->eat_date;
        // $food->save();
        
        // return redirect()->back();
    }
    
    public function destroy($id)
    {
        // $foods = \App\Food::find($id);
        // if (\Auth::id() === $food->user_id) {
        //     $food->delete();
        // }
        
        $food = Food::find($id);
        $food->delete();
        
        return redirect("/");
    }
    
    public function create()
    {
        $food = new Food;
        
        return view('foods.create', [
            'food' => $food,
        ]);
    }
    
    public function edit($id)
    {
        $food = Food::find($id);
        
        return view('foods.edit', [
            'food' => $food,
        ]);
    }
    
    public function show($id)
    {
        $food = Food::find($id);
        
        return view('foods.show', [
            'food' => $food,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:191',
        //     'calorie' => 'required|max:191',
        //     'eat_date' => 'required|max:191',
        // ]);
        
        // $request->user()->foods()->update([
        //     'name' => $request->name,
        //     'calorie' => $request->calorie,
        //     'eat_date' => $request->eat_date,
        // ]);
        
        $food = Food::find($id);
        $food->name = $request->name;
        $food->calorie = $request->calorie;
        $food->eat_date = $request->eat_date;
        $food->save();
        
        return redirect('/');
    }
    
    public function calc(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        //$userId = $request->userId;
        //$foods = Food::all()->wherein(
        $userIds = array_values($request->userId);
        //array_keys(キーを取得したい配列);
        //dd($userIds);
        $foods = Food::whereIn('user_id', $userIds)->get();
        //$foods = \DB::table('foods')->select('calorie', \DB::raw('SUM(\'calorie\') AS sum'))->groupBy('user_id')->get();
        
        $sum_calorie = \DB::table('users')
                    ->leftJoin('foods', 'foods.user_id', '=', 'users.id')
                    ->select('foods.user_id', 'users.name', \DB::raw('SUM(foods.calorie) AS sum'))
                    ->whereIn('users.id', $userIds)
                    ->where( 'foods.eat_date', '<=',$end_date)
                    ->where('foods.eat_date', '>=', $start_date)
                    ->groupBy('foods.user_id', 'users.name')
                    ->get();
        //dd($sum_calorie);
        
        
        foreach ($sum_calorie as $calorie) {
            $history = new History;
            $history->user_name = $calorie->name;
            $history->start_date = $start_date;
            $history->end_date = $end_date;
            $history->calorie = $calorie->sum;
            $history->save();
        }
        //dd($history);
        
        return view('foods.calc', [
            'start_date' => $start_date,
            'end_date' => $end_date,
            'sum_calorie' => $sum_calorie,
            'userIds' => $userIds,
            'foods' => $foods,
            
        ]);
    }
}
