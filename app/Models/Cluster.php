<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function dealer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Dealer::class);
    }

    public function outlets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Outlet::class);
    }
}
