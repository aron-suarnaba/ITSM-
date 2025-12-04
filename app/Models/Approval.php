<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'approval';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'approved_by_id',
        'ticket_number',
        'approval_rejected_notes',
        'void_at',
        'review_key',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function requests()
    {
        return $this->belongsTo(Requests::class, 'review_key', 'review_key');
    }
}
