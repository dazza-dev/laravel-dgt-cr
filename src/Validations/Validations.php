<?php

namespace DazzaDev\LaravelDgtCr\Validations;

class Validations
{
    protected $commonRules;

    protected $issuerRules;

    protected $receiverRules;

    protected $paymentsRules;

    public function __construct()
    {
        $this->commonRules = new Common;
        $this->issuerRules = new Issuer;
        $this->receiverRules = new Receiver;
        $this->paymentsRules = new Payments;
    }

    /**
     * Common rules.
     */
    public function commonRules(): array
    {
        return $this->commonRules->rules();
    }

    /**
     * Issuer rules.
     */
    public function issuerRules(): array
    {
        return $this->issuerRules->rules();
    }

    /**
     * Receiver rules.
     */
    public function receiverRules(): array
    {
        return $this->receiverRules->rules();
    }

    /**
     * Payments rules.
     */
    public function paymentsRules(): array
    {
        return $this->paymentsRules->rules();
    }

    /**
     * Invoice rules.
     */
    public function invoiceRules(): array
    {
        return array_merge(
            $this->basicRules(),
            $this->paymentsRules()
        );
    }

    /**
     * Credit note rules.
     */
    public function creditNoteRules(): array
    {
        return array_merge(
            $this->basicRules()
        );
    }

    /**
     * Debit note rules.
     */
    public function debitNoteRules(): array
    {
        return array_merge(
            $this->basicRules(),
            $this->paymentsRules()
        );
    }

    /**
     * Get the basic rules.
     */
    public function basicRules(): array
    {
        return array_merge(
            $this->commonRules(),
            $this->issuerRules(),
            $this->receiverRules(),
        );
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        $commonMessages = $this->commonRules->messages();
        $issuerMessages = $this->issuerRules->messages();
        $receiverMessages = $this->receiverRules->messages();
        $paymentsMessages = $this->paymentsRules->messages();

        return [
            ...$commonMessages,
            ...$issuerMessages,
            ...$receiverMessages,
            ...$paymentsMessages,
        ];
    }
}
