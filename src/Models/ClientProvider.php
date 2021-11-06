<?php

namespace Attla\SSO\Models;

use Attla\Database\Eloquent;

class ClientProvider extends Eloquent
{
    protected $fillable = [
        'name',
        'host',
        'callback',
    ];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany(PermissionGroup::class);
    }
}
