<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class UserRole extends Enum
{
    const User = 'user';
    const Provider = 'provider';
    const Admin = 'admin';
}
