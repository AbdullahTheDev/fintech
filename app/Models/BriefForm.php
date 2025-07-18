<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BriefForm extends Model
{
    use HasFactory;

    protected $table = 'brief_forms';

    protected $fillable = ['content', 'images', 'custom_id'];
}
