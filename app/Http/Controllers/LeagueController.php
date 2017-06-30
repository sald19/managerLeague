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
        $league = auth()->user()->leagues()->exists();
        return view('league.create')->withLeague($league);
    }

    public function store()
    {
        $league = request()->validate([
            'name' => 'required|unique:leagues',
            'email' => 'required|unique:leagues',
        ]);

        $league = array_add($league, 'default', request()->exists('default'));

        // create league for admin
        $league = auth()->user()->leagues()->create($league);

        //create season for new league
        $league->seasons()->create([
            'season_name' => 'first Season',
        ]);

        return response()->redirectToRoute('league.index');
    }
}
