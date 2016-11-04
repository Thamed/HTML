<?php
namespace Gallery\Http\Controllers;
use Gallery\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller{
    public function getResoults(Request $request){
        $query = $request->input('query');
        if(!$query){
            return redirect()->route('home')->with('info','User not found.');
        }

        $users = User::where(DB::raw("CONCAT(first_name, ' ', last_name)"),'LIKE', "%{$query}%")
        ->orWhere('username', 'LIKE', "%{$query}%")
        ->get();

        return view('search.resoults')->with('users', $users);
    }
}




