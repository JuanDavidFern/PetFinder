<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalUpdateRequest extends AnimalRequest
{

    public function rules(): array
    {
        // Obtén las reglas de validación de la clase padre
        $rules = parent::rules();

        // Elimina la regla de validación de la foto
        unset($rules['photo']);

        return $rules;
    }
}
