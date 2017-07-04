<?php

namespace App\Http\Controllers;

use App\League;
use App\Mail\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    public function leagueInvitationStore(League $league)
    {
        $invitation = request()->validate([
            'email' => 'required|email'
        ]);

        $invitation = array_add($invitation, 'token', str_random(40));

        $invitation = $league->invitations()->create($invitation);

        Mail::to($invitation['email'])->send(new Invitation($league, $invitation));
    }
}
