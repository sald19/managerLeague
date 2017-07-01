<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeam;

class TeamController extends Controller
{
    /**
     * TeamController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $leagues = auth()->user()->leagues;

        return view('team.index', compact('leagues'));
    }

    public function create()
    {
        $leagues = auth()->user()->leagues;

        return view('team.create', compact('leagues'));
    }

    public function store(StoreTeam $request)
    {

    }
}
