<?php

namespace App\Filters;

use App\Enums\UserType;

class UserFilter
{
    public function __construct(
        public ?string   $name = null,
        public ?string   $email = null,
        public ?UserType $type = null,
    )
    {
    }
}
