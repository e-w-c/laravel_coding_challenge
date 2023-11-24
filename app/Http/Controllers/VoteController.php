<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vote;
use Illuminate\Support\Facades\Route;


class VoteController extends Controller
{
    public function results($field = 'SortByName')
    {
        $sort_by_field = (strtolower($field) == 'sortbyimage') ? 'image_id' : 'name';
        
        $results = Vote::getResults($sort_by_field);

        return view('results', ['results'=>$results]);
    }
    
    public function postVote(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image_id' => 'required'
        ]);

        Vote::castVote($validated);

        return back();
    }
}
