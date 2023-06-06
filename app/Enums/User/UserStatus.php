<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class UserStatus extends Enum
{
    const Active = 'active';
    const Suspend = 'suspend';
    const Pending = 'pending';
}
