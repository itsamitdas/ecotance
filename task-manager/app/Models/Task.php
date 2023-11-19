<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * @var bool|\Carbon\Carbon|mixed
     */

    protected $fillable = ['title','description','completed_at','status'];
}
