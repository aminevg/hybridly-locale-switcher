<?php

namespace Aminevg\HybridlyLocaleSwitcher\Tests;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 */
class User extends Authenticatable
{
    protected $guarded = [];
}
