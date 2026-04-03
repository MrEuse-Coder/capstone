<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //
    protected $fillable = ['student_id', '1st_sem', '2nd_sem', 'summer'];

    protected $casts = [
        '1st_sem' => 'boolean',
        '2nd_sem' => 'boolean',
        'summer'  => 'boolean',
    ];


    public function student(){
        return $this->belongsTo(Student::class);
    }
}
