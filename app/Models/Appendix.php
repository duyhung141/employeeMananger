<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appendix extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'employee_id',
        'contract_id',
        'appendix_number',
        'type',
        'effective_date',
        'expired_date',
    ];

    public const TYPE_ADJUST_POSITION = 'ADJUST_POSITION'; // Điều chỉnh chức vụ
    public const TYPE_CHANGE_DEPARTMENT = 'CHANGE_DEPARTMENT'; // Thay đổi phòng ban
    public const TYPE_CHANGE_SALARY = 'CHANGE_SALARY'; // Điều chỉnh lương

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);    }

    public function getColType()
    {
        $type = '';
        switch ($this->type) {
            case self::TYPE_ADJUST_POSITION:
                $type = 'Điều chỉnh chức vụ';
                break;
            case self::TYPE_CHANGE_DEPARTMENT:
                $type = 'Thay đổi phòng ban';
                break;
            case self::TYPE_CHANGE_SALARY:
                $type = 'Điều chỉnh lương';
                break;
        }
        return $type;
    }

    public function getColExpiredDate()
    {
        return date('d-m-Y', strtotime($this->expired_date));
    }

    public function getColEffectiveDate()
    {
        return date('d-m-Y', strtotime($this->effective_date));
    }
}
