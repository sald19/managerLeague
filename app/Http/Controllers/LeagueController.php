<?php

namespace App\Http\Controllers;

use App\League;

class LeagueController extends Controller
{
    /**
     * LeagueController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $league = League::find(1);

        return view('league.create')->withLeague($league);
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
