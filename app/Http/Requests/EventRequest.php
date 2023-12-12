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
            'event_name' => 'required|string',
            'type' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'local' => 'required|string',
            'open_event' => 'in:on,off',
            'description' => 'max:255|string|nullable',
            'event_picture' => 'max:4096|mimes:jpg,jpeg,png|image|nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'event_name.required' => 'Ei, o seu evento precisa de um nome!',
            'type.required' => 'Você esqueceu do tipo de seu evento.',
            'date.required' => 'Tudo tem uma data para acontecer...',
            'time.required' => 'Horas?',
            'local.required' => 'Todo evento tem que acontecer em algum lugar.',
            'description.max' => 'Eita, resume isso ai um pouco.',
            'event_picture.max' => 'Só conseguimos guardar fotos até 4mb.',
            'event_picture.mimes' => 'Sua foto precisa ser em um dos formatos: jpg, jpeg, png.',
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
