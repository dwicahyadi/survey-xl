<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroCluster extends Model
{
    use HasFactory;
    protected $fillable = ['cluster_id', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function cluster(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cluster::class);
    }
}
