<?php

namespace Core\Http\Contracts;

interface Validator
{
    public function rules(): array;

    public function validate(): bool;

    public function message(): string;
}
