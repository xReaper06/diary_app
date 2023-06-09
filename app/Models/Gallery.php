<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $fillable =[
        'image',
        'place',
        'datehappen',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
