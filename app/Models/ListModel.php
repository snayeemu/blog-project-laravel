<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    use HasFactory;
    public $table = 'lists';

    // public $fillable = ["tasks", "status", "priority". "image"];
    public $guarded = [];
}
