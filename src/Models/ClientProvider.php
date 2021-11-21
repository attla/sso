<?php

namespace Attla\SSO\Models;

use Attla\Database\Eloquent;

class ClientProvider extends Eloquent
{
    protected $fillable = [
        'name',
        'host',
        'callback',
        'secret',
    ];

    public $timestamps = true;
}
