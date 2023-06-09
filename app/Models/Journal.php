<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $table = 'journals';
    protected $fillable = [
        'journaltitle',
        'eventhappen',
        'discriptions',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
