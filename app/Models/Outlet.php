<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $fillable = ['cluster_id','dealer_id','xl_outlet_id','type','name','msisdn','address'
        ,'micro_cluster', 'province','city'];

    protected $hidden = ["created_at", "updated_at"];

    public function cluster(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cluster::class);
    }

    public function dealer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Dealer::class);
    }

    public function surveys(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Survey::class);
    }

    public function latest_survey(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->surveys()->with('details')->latest()->take(1);
    }
}
