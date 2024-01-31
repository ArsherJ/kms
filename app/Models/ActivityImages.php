<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ActivityImages extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'activity_id',
        'blob_image'
    ];
    
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
        static::creating(function ($model) { $model->created_by = Auth::id(); });
        static::updating(function ($model) { $model->updated_by = Auth::id(); });
    }

    // Auto-Load of Relationship
    protected $with = ["createdByUser", "updatedByUser"];
}
