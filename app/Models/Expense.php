<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
