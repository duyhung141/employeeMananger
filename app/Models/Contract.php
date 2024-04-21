<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'contract_number',
        'employee_id',
        'salary_id',
        'type',
        'effective_date',
        'expired_date',
        'status',
    ];

    public const TYPE_PROBATION = 'PROBATION'; // Thử việc
    public const TYPE_1_YEAR = '1_YEAR'; // 1 năm
    public const TYPE_2_YEAR = '2_YEAR'; // 2 năm
    public const TYPE_APPRENTICESHIP = 'APPRENTICESHIP'; // Học việc

    public const STATUS_APPLY = 'APPLY'; // Đang áp dụng
    public const STATUS_NOT_APPLY = 'NOT_APPLY'; // Chưa áp dụng
    public const STATUS_EXPIRED = 'EXPIRED'; // Hết hạn

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function getColType()
    {
        $type = '';
        switch ($this->type) {
            case self::TYPE_PROBATION:
                $type = 'Thử việc';
                break;
            case self::TYPE_1_YEAR:
                $type = '1 năm';
                break;
            case self::TYPE_2_YEAR:
                $type = '2 năm';
                break;
            case self::TYPE_APPRENTICESHIP:
                $type = 'Học việc';
                break;
        }
        return $type;
    }

    public function getColEffectiveDate()
    {
        return date('d/m/Y', strtotime($this->effective_date));
    }

    public function getColExpiredDate()
    {
        return date('d/m/Y', strtotime($this->expired_date));
    }

    public function getColStatus()
    {
        $status = '';
        if($this->getColExpiredDate() < date('d/m/Y') && $this->status == self::STATUS_APPLY)
        {
            return 'Hết hiệu lực';
        }
        switch ($this->status) {
            case self::STATUS_NOT_APPLY:
                $status = 'Chưa áp dụng';
                break;
            case self::STATUS_APPLY:
                $status = 'Đã áp dụng';
                break;
        }
        return $status;
    }

    public function checkStatusExpired()
    {
        if($this->getColExpiredDate() < date('d/m/Y') && $this->status == self::STATUS_APPLY)
        {
            return true;
        }
        return false;
    }
}
