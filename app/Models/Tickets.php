<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tickets extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'tickets';

    /**
     * The attributes that are mass assignable.
     * This includes all columns expected to be set upon creation or update.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Submission Phase
        'requested_by_id',
        'requested_date',
        'needed_date',
        'requested_cat',
        'requested_details',
        'request_type',
        'detailed_description',

        // Review/Assignment Phase (Can be null)
        'ticket_number',
        'datetime_received',
        'received_by_id',
        'acknowledge_by_id',
        'approximate_date',
        'estimate_days',
        'assigned_to_id',
        'datetime_started',
        'datetime_finished',
        'detailed_description',
        'findings',
        'action_taken',

        // Approval Phase (Can be null)
        'reviewed_by_id',
        'approved_by_id',
        'enduser_acceptance_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'requested_date' => 'datetime',
        'needed_date' => 'date',
        'approximate_date' => 'date',
        'datetime_received' => 'datetime',
        'datetime_started' => 'datetime',
        'datetime_finished' => 'datetime',
        'estimate_days' => 'integer',
    ];

    // ------------------------------------------
    // RELATIONSHIPS
    // ------------------------------------------

    /**
     * Get the User who created the ticket.
     */
    public function requester(): BelongsTo
    {
        // Eloquent needs to be told that the foreign key is 'requested_by_id'
        // AND the owner key on the User model is 'employee_id'.
        return $this->belongsTo(User::class, 'requested_by_id', 'employee_id');
    }

    /**
     * Get the User who received the ticket.
     */
    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by_id', 'employee_id');
    }

    /**
     * Get the User who acknowledged the ticket.
     */
    public function acknowledger(): BelongsTo
    {
        return $this->belongsTo(User::class, 'acknowledge_by_id', 'employee_id');
    }

    /**
     * Get the User to whom the ticket is assigned.
     */
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_id', 'employee_id');
    }

    /**
     * Get the User who reviewed the completed ticket.
     */
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by_id', 'employee_id');
    }

    /**
     * Get the User who approved the ticket resolution.
     */
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_id', 'employee_id');
    }

    /**
     * Get the User who gave final end-user acceptance.
     */
    public function endUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'enduser_acceptance_id', 'employee_id');
    }
}
