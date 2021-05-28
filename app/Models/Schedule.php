<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject_id',
        'lecturer_user_id',
        'start_date',
        'end_date',
        'created_at'

    ];

    /**
     * Get the phone associated with the user.
     */
    public function subject()
    {
        return $this->hasOne(Subject::class);
    }
}
