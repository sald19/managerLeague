<?php

namespace App\Http\Controllers;

use App\League;
use Illuminate\Http\Request;

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
}
