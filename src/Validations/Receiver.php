<?php

namespace DazzaDev\LaravelDgtCr\Validations;

use DazzaDev\LaravelDgtCr\Rules\ExistsInListings;

class Receiver
{
    /**
     * Receiver rules.
     */
    public function rules(): array
    {
        return [
            'receiver.identification_type' => ['required', new ExistsInListings('tipos-identificacion')],
            'receiver.identification_number' => ['required'],
            'receiver.name' => ['required'],
            'receiver.trade_name' => ['nullable'],
            'receiver.activity' => ['nullable'],
            'receiver.phone' => ['required', 'array'],
            'receiver.phone.country_code' => ['required'],
            'receiver.phone.number' => ['required'],
            'receiver.email' => ['required'],
            'receiver.email.*' => ['email'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'receiver.identification_type.required' => 'El tipo de identificación del receptor es obligatorio.',
            'receiver.identification_type.exists_in_listings' => 'El tipo de identificación del receptor no es válido (revisar listado de tipos de identificación).',
            'receiver.identification_number.required' => 'El número de identificación del receptor es obligatorio.',
            'receiver.name.required' => 'El nombre del receptor es obligatorio.',
            'receiver.phone.required' => 'El teléfono del receptor es obligatorio.',
            'receiver.phone.array' => 'El teléfono del receptor debe ser un array.',
            'receiver.phone.country_code.required' => 'El código de país del teléfono del receptor es obligatorio.',
            'receiver.phone.number.required' => 'El número de teléfono del receptor es obligatorio.',
            'receiver.email.required' => 'El correo electrónico del receptor es obligatorio.',
            'receiver.email.*.email' => 'El correo electrónico del receptor debe ser válido.',
        ];
    }
}
