<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class profileRequest extends FormRequest
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
            "name" => "string",
            "avatar" => "image|mimes:jpeg,png,jpg|max:2048",
            "phone" => "string|max:20",
            "bio" => "string",
        ];
    }

    public function messages(){
        return [
            "name.string" => "Le nom doit être une chaîne de caractères.",
            "avatar.image" => "Le fichier doit être une image.",
            "avatar.mimes" => "Le fichier doit être une image de type: jpeg, png, jpg.",
            "avatar.max" => "Le fichier ne doit pas dépasser 2 Mo.",
            "phone.string" => "Le numéro de téléphone doit être une chaîne de caractères.",
            "phone.max" => "Le numéro de téléphone ne doit pas dépasser 20 caractères.",
            "bio.string" =>  "bio doit être une chaîne de caractères.",
        ];
    }
}