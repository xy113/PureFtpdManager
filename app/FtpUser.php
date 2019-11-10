<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FtpUser extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'userid';
    protected $dateFormat = 'U';
    protected $fillable = [
        'User','Password','Uid','Gid','Dir',
        'QuotaFiles','QuotaSize','ULBandwidth','DLBandwidth','Status','ULRatio','DLRatio'
    ];

    public $timestamps = false;
}
