<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'department',
        'position',
        'type',
        'gender',
        'birthday',
        'address',
        'nationality',
        'identity_card',
        'phone',
        'email',
        'tax_code',
    ];

    public const TYPE_PROBATION = 'PROBATION'; // Thử việc
    public const TYPE_OFFICIAL = 'OFFICIAL'; // Chính thức
    public const TYPE_INTERN = 'INTERN'; // Thực tập sinh

    public const GENDER_MALE = "MALE";
    public const GENDER_FEMALE = "FEMALE";

    public function salary()
    {
        return $this->hasMany(Salary::class, 'employee_id', 'id');
    }

    public function getColBirthday()
    {
        return date('d/m/Y', strtotime($this->birthday));
    }

    public function getColType()
    {
        $type = '';
        switch ($this->getColType()) {
            case self::TYPE_PROBATION:
                $type = 'Thử việc';
                break;
            case self::TYPE_OFFICIAL:
                $type = 'Chính thức';
                break;
            case self::TYPE_INTERN:
                $type = 'Thực tập sinh';
                break;
        }
        return $type;
    }

    public function getColGender()
    {
        if ($this->gender == self::GENDER_MALE) {
            return 'Nam';
        } else {
            return 'Nữ';
        }
    }
}
