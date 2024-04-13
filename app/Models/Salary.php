<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'decision_code',
        'employee_id',
        'department_id',
        'effective_date',
        'expired_date',
        'tax_schedule',
        'basic_salary',
        'negotiable_salary',
        'coefficient_salary',
        'status',
    ];

    public const STATUS_NOT_APPLY = 'NOT_APPLY';
    public const STATUS_APPLY = 'APPLY';
    public const STATUS_EXPIRED = 'EXPIRE';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getColEffectiveDate()
    {
        return date('d/m/Y', strtotime($this->effective_date));
    }

    public function getColExpiredDate()
    {
        return date('d/m/Y', strtotime($this->expired_date));
    }

    public function getColTaxSchedule()
    {
        return number_format($this->tax_schedule, 0, ',', '.');
    }

    public function getColBacsicSalary()
    {
        return number_format($this->basic_salary, 0, ',', '.');
    }

    public function getColNegotiableSalary()
    {
        return number_format($this->negotiable_salary, 0, ',', '.');
    }

    public function getColCoefficientSalary()
    {
        return number_format($this->coefficient_salary, 0, ',', '.');
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
}
