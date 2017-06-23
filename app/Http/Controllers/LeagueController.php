<?php

namespace App\Http\Controllers;

use App\League;

class LeagueController extends Controller
{
    public function create()
    {
        return view('league.create');
    }

    public function store()
    {
        $league = request()->validate([
            'name' => 'required|unique:leagues',
            'email' => 'required|unique:leagues',
        ]);

        League::create($league);

        return response()->redirectToRoute('league.create');
    }
}
