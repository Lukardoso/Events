<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'event_name' => 'string|required',
            'type' => 'string|required',
            'date' => 'date|required|after_or_equal:today',
            'time' => 'date_format:H:i|required',
            'local' => 'string|required',
            'open_event' => 'in:on,off',
            'description' => 'string|max:255',
        ];
    }
}
