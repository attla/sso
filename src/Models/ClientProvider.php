<?php

namespace Attla\SSO\Models;

use Attla\Database\Eloquent;
use Attla\Permission\Models\PermissionGroup;

class ClientProvider extends Eloquent
{
    protected $fillable = [
        'name',
        'host',
        'callback',
        'secret',
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
