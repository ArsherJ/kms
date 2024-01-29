<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\FeedingProgramIRLogs;

class IndividualRecord extends Model
{

    use HasFactory, SoftDeletes;

    // FILLABLES
    protected $fillable = [
        'id_number',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birthdate',
        'height',
        'weight',
        'bmi',
        'bmi_category',
        'status',
        'id_number',
    ];

    // DATES
    protected $dates = ['deleted_at'];

    // RELATIONSHIP
    public function feeding_program_ir_logs()
    {
        return $this->hasMany(FeedingProgramIRLogs::class, 'individual_record_id')->without('history_of_indivdual_records, individual_records', 'feeding_programs');
    }

    public function history_of_individual_records()
    {
        return $this->hasMany(HistoryOfIndividualRecord::class, 'history_of_individual_record_id')->without('history_of_indivdual_records, individual_records', 'feeding_programs');
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
    protected $with = ["createdByUser", "updatedByUser"];
}
