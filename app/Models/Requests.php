<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Casts\AsUuid;

class Requests extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * Note: Laravel assumes 'requests', but since your migration uses 'request',
     * it's explicitly defined here.
     *
     * @var string
     */
    protected $table = 'requests';

    /**
     * The attributes that are mass assignable.
     * These are the fields you can fill using create() or update().
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'requested_by_id',
        'needed_date',
        'requested_cat',
        'requested_details',
        'request_type',
        'detailed_description',
        'review_key',
        'reject_on_approval_notes',
        'reject_at',
    ];

    /**
     * The attributes that should be cast to native types.
     * This is crucial for automatically converting the 'status' string to your Enum object.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'needed_date' => 'date', // Casts the needed_date string to a Carbon object
        'status' => RequestStatus::class, // Casts the status string to your RequestStatus Enum
        'reject_at' => 'dateTime'
    ];

    // --- Relationships ---

    /**
     * Get the user who made the request.
     */
    public function requestedBy()
    {
        // Assumes your 'users' table uses 'employee_id' as the foreign key
        // as defined in your migration: $table->foreign('requested_by_id')->references('employee_id')->on('users');
        return $this->belongsTo(User::class, 'requested_by_id', 'employee_id');
    }

    /**
     * Get the associated Review record.
     */
    // public function review()
    // {
    //     // Link to the 'review' table using the custom 'review_key'
    //     return $this->hasOne(Review::class, 'review_key', 'review_key');
    // }

    /**
     * Get the associated Approval record. (Assumes an Approval model exists)
     */
    public function approval()
    {
        return $this->hasMany(Approval::class, 'review_key', 'review_key');
    }

    /**
     * Get the associated Checking record. (Assumes a Checking model exists)
     */
    // public function checking()
    // {
    //     return $this->hasOne(Checking::class, 'review_key', 'review_key');
    // }

    /**
     * Get the associated Working record. (Assumes a Working model exists)
     */
    // public function working()
    // {
    //     return $this->hasOne(Working::class, 'review_key', 'review_key');
    // }
}
