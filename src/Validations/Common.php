<?php

namespace DazzaDev\LaravelDgtCr\Validations;

class Common
{
    /**
     * Common rules.
     */
    public function rules(): array
    {
        return [
            'establishment' => ['required'],
            'emission_point' => ['required'],
            'sequential' => ['required'],
            'date' => ['required'],
            'situation' => ['required'],
            'sale_condition' => ['required'],
            'security_key' => ['required'],
            'currency' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'establishment.required' => 'El establecimiento es obligatorio.',
            'emission_point.required' => 'El punto de emisión es obligatorio.',
            'sequential.required' => 'El número secuencial es obligatorio.',
            'date.required' => 'La fecha es obligatoria.',
            'situation.required' => 'La situación es obligatoria.',
            'sale_condition.required' => 'La condición de venta es obligatoria.',
            'security_key.required' => 'La llave de seguridad es obligatoria.',
            'currency.required' => 'La moneda es obligatoria.',
        ];
    }
}
