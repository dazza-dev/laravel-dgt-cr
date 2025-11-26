<?php

namespace DazzaDev\LaravelDgtCr\Validations;

use DazzaDev\LaravelDgtCr\Rules\ExistsInListings;

class Issuer
{
    /**
     * Issuer rules.
     */
    public function rules(): array
    {
        return [
            'issuer.identification_type' => ['required', new ExistsInListings('tipos-identificacion')],
            'issuer.identification_number' => ['required'],
            'issuer.name' => ['required'],
            'issuer.trade_name' => ['nullable'],
            'issuer.activity' => ['required'],
            'issuer.phone' => ['required', 'array'],
            'issuer.phone.country_code' => ['required'],
            'issuer.phone.number' => ['required'],
            'issuer.email' => ['required'],
            'issuer.email.*' => ['email'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'issuer.identification_type.required' => 'El tipo de identificación del emisor es obligatorio.',
            'issuer.identification_type.exists_in_listings' => 'El tipo de identificación del emisor no es válido (revisar listado de tipos de identificación).',
            'issuer.identification_number.required' => 'El número de identificación del emisor es obligatorio.',
            'issuer.name.required' => 'El nombre del emisor es obligatorio.',
            'issuer.activity.required' => 'La actividad del emisor es obligatoria.',
            'issuer.phone.required' => 'El teléfono del emisor es obligatorio.',
            'issuer.phone.array' => 'El teléfono del emisor debe ser un array.',
            'issuer.phone.country_code.required' => 'El código de país del teléfono del emisor es obligatorio.',
            'issuer.phone.number.required' => 'El número de teléfono del emisor es obligatorio.',
            'issuer.email.required' => 'El correo electrónico del emisor es obligatorio.',
            'issuer.email.*.email' => 'El correo electrónico del emisor debe ser válido.',
        ];
    }
}
