<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;

class ContentDirectory extends Model
{
    use HasFactory, SoftDeletes;

    // FILLABLES
    protected $fillable = [
        'tag',
        'directory',
    ];

    // DATES
    protected $dates = ['deleted_at'];

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
