<?php

namespace App\Rules;

use App\Invitation;
use Illuminate\Contracts\Validation\Rule;

class ValidInvitation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Invitation::where([
            'token' => $value,
            'used'  => 0
        ])->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This invitation is invalid.';
    }
}
