<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    protected $fillable = ['content', 'author', 'category_id'];

    public $timestamps = false;
}