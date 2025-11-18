<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // DB is not strictly needed for Eloquent queries

// Assuming you rename TicketGenerator back to the standard Eloquent Model name: Ticket
class TicketGenerator extends Model
{
    use HasFactory;

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
        $year = $now->format('y'); // Last two digits of the year (e.g., 25)
        $month = $now->format('n'); // Month number (1-12)

        // Determine Category Code
        $categoryCode = match (strtolower($requestCategory)) {
            'software' => 'S',
            'technical' => 'T',
            default => 'O', // 'O' for Other/Default
        };

        // Construct the base prefix for the query (e.g., 'JR-S2511-S')
        $prefix = "JR-{$categoryCode}{$year}{$month}-S";

        // Find the last sequential number for the current prefix
        // NOTE: If you are using 'Ticket' as the model name, use 'static::' or 'Ticket::'
        $lastTicket = static::where('ticket_number', 'like', "{$prefix}%")
                            ->orderBy('ticket_number', 'desc')
                            ->first();

        $numericLength = 4; // Assuming 4 digits (S0000 to S9999) based on the "S000" example

        // Determine the next sequence number
        if ($lastTicket) {
            // Extract the numeric part (e.g., '0001' from 'JR-S2511-S0001')
            // Use the full numeric length for extraction
            $lastNumber = (int) substr($lastTicket->ticket_number, -$numericLength);
            $nextNumber = $lastNumber + 1;
        } else {
            // If no records found for this prefix, start at 1
            $nextNumber = 1;
        }

        // Format the sequence number as a four-digit string (e.g., 1 -> '0001')
        $sequenceNumber = str_pad($nextNumber, $numericLength, '0', STR_PAD_LEFT);

        // Combine all parts
        return "{$prefix}{$sequenceNumber}";
    }
}
