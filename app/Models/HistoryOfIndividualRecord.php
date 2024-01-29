<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\IndividualRecord;


class HistoryOfIndividualRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'individual_record_id',
        'height',
        'weight',
        'bmi',
        'bmi_category',
        'date_recorded',
    ];

    public function individual_records()
    {
        return $this->belongsTo(IndividualRecord::class, 'individual_record_id');
    }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by')->without('roles');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by')->without('roles');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }

    // AUTO LOADING RELATIONSHIP
    protected $with = ["individual_records", "createdByUser"];
}
