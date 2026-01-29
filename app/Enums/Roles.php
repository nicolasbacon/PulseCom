<?php

namespace App\Enums;

enum Roles: string
{
    case ROLE_READER = 'ROLE_READER';
    case ROLE_WRITER = 'ROLE_WRITER';
    case ROLE_ADMIN = 'ROLE_ADMIN';
}
