<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'rates';

    public function category() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
