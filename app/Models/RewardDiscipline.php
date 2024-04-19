<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardDiscipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'reward_discipline_number',
        'type',
        'effective_date',
        'reason',
        'content',
        'amount',
        'employee_id',
    ];

    public const TYPE_REWARD = 'REWARD';
    public const TYPE_DISCIPLINE = 'DISCIPLINE';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getColType()
    {
        $type = '';
        switch ($this->type) {
            case self::TYPE_REWARD:
                $type = 'Khen thưởng';
                break;
            case self::TYPE_DISCIPLINE:
                $type = 'Kỷ luật';
                break;
        }
        return $type;
    }

    public function getColEffectiveDate()
    {
        return date('d/m/Y', strtotime($this->effective_date));
    }

    public function getColAmount()
    {
        return number_format($this->amount, 0, '.', ',');
    }
}
