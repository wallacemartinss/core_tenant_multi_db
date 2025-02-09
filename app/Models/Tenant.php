<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\{HasDatabase, HasDomains};
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase;
    use HasDomains;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function domains(): HasMany
    {
        return $this->hasMany(related: Domain::class);
    }

    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'phone',
            'email',
            'password',

        ];
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = Hash::make($value);
    }
}
