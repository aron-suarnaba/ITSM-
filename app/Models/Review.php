<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RequestStatus; // Assuming 'status' on 'review' might align with these states

class Review extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * Note: Laravel assumes 'reviews', but since your migration uses 'review',
     * it's explicitly defined here.
     *
     * @var string
     */
    protected $table = 'review';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'review_key',
        'reviewed_by_id',
        'review_at',
        'review_rejected_notes',
        'approve_key',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Casts 'status' to your shared Enum if it represents one of the defined statuses
        'status' => RequestStatus::class,

        // Casts the 'review_at' string to a Carbon object
        'review_at' => 'datetime',

        // Casts the 'approve_key' to a UUID object
        'approve_key' => 'uuid',
    ];

    // --- Relationships ---

    /**
     * Get the user who performed the review.
     */
    public function reviewedBy()
    {
        // Assumes your 'users' table uses 'employee_id' as the foreign key
        // as defined in your migration: $table->foreign('reviewed_by_id')->references('employee_id')->on('users');
        return $this->belongsTo(User::class, 'reviewed_by_id', 'employee_id');
    }

    /**
     * Get the associated request that this review belongs to.
     * This establishes the reverse relationship based on the review_key/approve_key.
     */
    public function request()
    {
        // This assumes the 'request' model links back using the 'review_key'
        // where the foreign key on the 'request' table is 'review_key'
        // and the local key on the 'review' table is 'review_key'.
        return $this->hasOne(Request::class, 'review_key', 'review_key');
    }
}
