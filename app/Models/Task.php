<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public $fillable = ["name","priority","project_id"];
    const HIGH=1;
    const MEDIUM=2;
    const LOW=3;
    public function getPriorityAttribute($value)
    {
        if($value == self::HIGH){
            return "High";
        }else if($value == self::MEDIUM){
            return "Medium";
        }else{
            return "Low";
        }
    }
}
