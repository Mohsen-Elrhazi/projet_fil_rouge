<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            "email" => "email:dns,rfc|unique:users,email,".$this->user()->id,
            "avatar" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "phone" => "nullable|string|max:20",
            "adress" => "nullable|string",
            "birth_date" => "nullable|date",
            "bio" => "nullable|string",
        ];
    }

    public function messages(){
        return [
            "name.string" => "Le nom doit être une chaîne de caractères.",
            "email.email" => "Veuillez fournir une adresse email valide.",
            "email.unique" => "Cet email est déjà utilisé.",
            "avatar.image" => "Le fichier doit être une image.",
            "avatar.mimes" => "Le fichier doit être une image de type: jpeg, png, jpg.",
            "avatar.max" => "Le fichier ne doit pas dépasser 2 Mo.",
            "phone.string" => "Le numéro de téléphone doit être une chaîne de caractères.",
            "phone.max" => "Le numéro de téléphone ne doit pas dépasser 20 caractères.",
            "adress.string" => "L'adresse doit être une chaîne de caractères.",
            "birth_date.date" => "La date de naissance doit être une date.",
        ];
    }
}