<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carer extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Auditable;

    public const TITLE_SELECT = [
        'Mr'   => 'Mr',
        'Mrs'  => 'Mrs',
        'Miss' => 'Miss',
        'Rev'  => 'Rev',
        'Dr'   => 'Dr',
    ];

    public const RELATIONSHIP_TYPE = [
        'Father'   => 'Father',
        'Mother'  => 'Mother',
        'Guardian'  => 'Guardian',
        'Grandfather' => 'Grandfather',
        'Grandmother'  => 'Grandmother',
        'Uncle'   => 'Uncle',
        'Auntie'   => 'Auntie',
        'Brother'   => 'Brother',
        'Sister'   => 'Sister',
    ];

    public $table = 'carers';

    public $orderable = [
        'id',
        'title',
        'firstname',
        'lastname',
        'address',
        'post_code',
        'contact_number',
        'work_contact_number',
        'email',
        'national_insurance_number',
        'relationship_type',
        'family.family_name',
    ];

    public $filterable = [
        'id',
        'title',
        'firstname',
        'lastname',
        'address',
        'post_code',
        'contact_number',
        'work_contact_number',
        'email',
        'national_insurance_number',
        'relationship_type',
        'family.family_name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'firstname',
        'lastname',
        'address',
        'post_code',
        'contact_number',
        'work_contact_number',
        'email',
        'national_insurance_number',
        'relationship_type',
        'family_id',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getTitleLabelAttribute($value)
    {
        return static::TITLE_SELECT[$this->title] ?? null;
    }

    public function  getRelationshipTypeLabelAttribute($value)
    {
        return static::RELATIONSHIP_TYPE[$this->relationship_type] ?? null;
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
