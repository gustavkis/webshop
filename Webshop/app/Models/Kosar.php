<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kosar extends Model
{
    use HasFactory;
    public $table="kosar";
    public $primaryKey="termek_id";
    public $timestamp= false;
    public $guarded = [];

    public function termek()
    {
        return $this->belongsTo(Termek::class, 'termek_id');
    }
}
