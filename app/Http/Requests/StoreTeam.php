<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTeam extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => Rule::unique('teams')->where(function ($query) {
                    $query->where('league_id', $this->input('league_id'));
                }),
            'league_id' => 'required|exists:leagues,id',
            'email' => 'required|email'
        ];
    }
}
