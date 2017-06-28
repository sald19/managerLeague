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

    public function index()
    {
        $leagues = auth()->user()->leagues;

        return view('league.index', compact('leagues'));
    }

    public function create()
    {
        $league = auth()->user()->league;

        return view('league.create')->withLeague($league);
    }

    public function store()
    {
        $league = request()->validate([
            'name' => 'required|unique:leagues',
            'email' => 'required|unique:leagues',
        ]);

        $league = array_add($league, 'default', request()->exists('default'));

        auth()->user()->leagues()->create($league);

        return response()->redirectToRoute('league.index');
    }
}
