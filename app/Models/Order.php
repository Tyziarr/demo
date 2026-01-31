<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'course_name',
        'desired_start_date',
        'payment_method',
        'phone',
        'status',
    ];

    protected $casts = [
        'desired_start_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
