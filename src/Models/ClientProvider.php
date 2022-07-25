<?php

namespace Attla\SSO\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProvider extends Model
{
    protected $fillable = [
        'name',
        'host',
        'callback',
        'secret',
    ];

    public $timestamps = true;
}
