<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildSignOut extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'child_sign_outs';

    protected $fillable = [
        'child_id',
        'register_id',
        'carer_id',
        'sign_out_time',
        'staff_initial',
    ];

    protected $dates = [
        'sign_out_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function setSignOutTimeAttribute($value)
    {
        $this->attributes['sign_out_time'] = $value ? Carbon::parse($value)->format('H:m') . ':00' : null;
    }

}
