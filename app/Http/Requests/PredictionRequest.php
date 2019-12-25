<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PredictionRequest extends FormRequest
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
            'city_id' => 'required|exists:cities,id',
            'day'     => 'required|date|date_format:Y-m-d|after_or_equal:today|before_or_equal:' . today()->addDays(10),
            'scale'   => 'required|in:Celsius,Fahrenheit'
        ];
    }
}
