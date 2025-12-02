<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // DB is not strictly needed for Eloquent queries

// Assuming you rename TicketGenerator back to the standard Eloquent Model name: Ticket
class TicketGenerator extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    // ... (Your other model definitions like $fillable, $casts, relationships) ...

    /**
     * Generates the custom sequential ticket number.
     *
     * @param string $requestCategory The 'requested_cat' value (e.g., 'Software', 'Technical').
     * @return string The generated ticket number (e.g., 'JR-S2511-S0001').
     */
    public static function generateTicketNumber(string $requestCategory): string
    {
        $now = now();
        $year = $now->format('y');  // Last two digits, e.g. 25
        $month = $now->format('m'); // Always two digits: 01–12

        // Map category to code
        $categoryCode = match (strtolower($requestCategory)) {
            'software' => 'S',
            'technical' => 'T',
            default => 'O',
        };

        // Prefix for this month's tickets
        // Example: JR-S2501-S
        $prefix = "JR-{$categoryCode}{$year}{$month}-S";

        // Look for last ticket this month
        $lastTicket = static::where('ticket_number', 'like', "{$prefix}%")
            ->orderBy('ticket_number', 'desc')
            ->first();

        $numericLength = 4; // 0001–9999

        // Determine next sequence number
        if ($lastTicket) {
            $lastNumber = (int) substr($lastTicket->ticket_number, -$numericLength);
            $nextNumber = $lastNumber + 1;
        } else {
            // If no tickets this month, start fresh at 1
            $nextNumber = 1;
        }

        $sequenceNumber = str_pad($nextNumber, $numericLength, '0', STR_PAD_LEFT);

        return "{$prefix}{$sequenceNumber}";
    }

}
