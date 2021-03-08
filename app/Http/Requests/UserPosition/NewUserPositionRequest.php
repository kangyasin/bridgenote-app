<?php

namespace App\Http\Requests\UserPosition;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class NewUserPositionRequest extends ApiFormRequest
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
            'user_id' => 'required|exists:users,id',
            'position' => 'required|string|min:3',
            'status' => ['required', Rule::in(['active','inactive'])]
        ];
    }
}
