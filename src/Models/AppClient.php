<?php

namespace FireAZ\Clients\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppClient extends Model
{
    use HasFactory;
    public $table = 'app_clients';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'client_logo',
        'client_name',
        'client_id',
        'client_key',

        'client_type',
        'client_app_key',
        'client_version',
        'client_update_required',
        'client_build_number',

        'locked',
        'client_update_at',
        'client_option'
    ];
    protected $casts = [
        'client_option' => 'array',
    ];
}
