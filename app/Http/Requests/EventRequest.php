<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

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
            'event_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:4000,'
        ];
    }

    /**
     * Store picture after validation.
     */
    public function storePicture(): string
    {
        if($this->file('event_picture'))
        {
            $picturePath = $this->setUserPicturePath();
            $picturePath = $this->file('event_picture')->store($picturePath, 'public');      
        } else {
            $picturePath = "default_picture.png";
        }        
        
        return $picturePath;
    }

    /**
     * Create a path to the event picture with the username.
     */
    private function setUserPicturePath(): string
    {
        $username = strtolower(Auth::user()->name);

        $picturePath = str_replace(' ', '', $username);
        
        return $picturePath;
    }
}
