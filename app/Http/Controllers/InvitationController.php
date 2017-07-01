<?php

namespace App\Http\Controllers;

use App\League;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function leagueInvitationStore(League $league)
    {
        $invitation = request()->validate([
            'email' => 'required|email'
        ]);

        $invitation = array_add($invitation, 'token', str_random(40));

        $league->invitations()->create($invitation);
    }
}
