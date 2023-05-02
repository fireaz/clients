<?php

namespace FireAZ\Clients\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppAds extends Model
{
    use HasFactory;
    public $table = 'app_ads';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'client_id',
        'name',
        'ads_id',
        'ads_key',
        'ads_size',
        'ads_type', // banner or popup or type of Admob 
        'ads_image',
        'ads_link',
        'position',
        'view_type', //Link Banner Or Admob Or ...
        'client_type', //ios/android/web
        'from_date', //
        'to_date',
        'locked'
    ];
    protected $casts = [
        'from_date' =>  'datetime',
        'to_date' =>  'datetime',
    ];
}
