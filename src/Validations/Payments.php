<?php

namespace DazzaDev\LaravelDgtCr\Validations;

use DazzaDev\LaravelDgtCr\Rules\ExistsInListings;

class Payments
{
    /**
     * Payment rules.
     */
    public function rules(): array
    {
        return [
            'payments' => ['nullable', 'array'],
            'payments.*.payment_method' => ['required', new ExistsInListings('metodos-pago')],
            'payments.*.amount' => ['required', 'numeric', 'min:0'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'payments.*.payment_method.required' => 'El método de pago es obligatorio.',
            'payments.*.payment_method.exists_in_listings' => 'El método de pago no es válido (revisar listado de métodos de pago).',
            'payments.*.amount.required' => 'El monto del pago es obligatorio.',
            'payments.*.amount.numeric' => 'El monto del pago debe ser un número.',
            'payments.*.amount.min' => 'El monto del pago debe ser mayor o igual a 0.',
        ];
    }
}
