<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowanceSubsidy extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'effective_date',
        'amount',
        'note',
        'employee_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function scopeFilter($query, $filters)
    {
        if (isset($filters['code'])) {
            $query->where('code', 'like', '%' . $filters['code'] . '%');
        }

        if (isset($filters['type'])) {
            $query->where('type', 'like', '%' . $filters['type'] . '%');
        }

        if (isset($filters['effective_date'])) {
            $query->where('effective_date', $filters['effective_date']);
        }

        if (isset($filters['amount'])) {
            $query->where('amount', $filters['amount']);
        }

        if (isset($filters['note'])) {
            $query->where('note', 'like', '%' . $filters['note'] . '%');
        }

        if (isset($filters['employee_id'])) {
            $query->where('employee_id', $filters['employee_id']);
        }

        return $query;
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
