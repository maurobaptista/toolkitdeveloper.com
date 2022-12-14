<?php

namespace App\Tools\CoordinatesToAddress;

use App\Tools\ValidationContract;

class Validation extends ValidationContract
{
    public function rules(): array
    {
        return [
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
        ];
    }
}
