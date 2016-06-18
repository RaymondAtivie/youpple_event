<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventFormRequest extends Request
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
            'title' => 'required|unique:events|max:255',
            'description' => 'required',
            'event_type' => 'required',
            'venue' => 'required',
            'datetime' => 'required|date|after:today',
            'datetime_end' => 'date|after:datetime',
        ];
    }
}
