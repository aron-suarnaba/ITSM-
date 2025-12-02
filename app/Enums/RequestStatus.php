<?php

namespace App\Enums;

enum RequestStatus: string {
    // ➡️ Request Submission/Initial Stages
    case FOR_REVIEW = 'For Review';
    case REJECTED_ON_REVIEW = 'Rejected On Review';

    // ➡️ Approval Stages
    case FOR_APPROVAL = 'For Approval';
    case REJECTED_ON_APPROVAL = 'Rejected on Approval';

    // ➡️ IT/Processing Stages
    case FOR_CHECKING = 'For Checking'; // Reviewal of IT Department
    case VOID = 'Void'; // Rejection for checking / permanently closed

    // ➡️ Ticket/Work Stages
    case OPEN_TICKET = 'Open Ticket';
    case WORKING_ON_TICKET = 'Working on Ticket';

    // ➡️ Final/Terminal Stage
    case COMPLETE = 'Complete';

    /**
     * Get a list of all raw string values of the enum cases.
     * Used typically for database interactions (migrations, seeding) or validation rules.
     *
     * @return array<string>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get a list of statuses that signify the request is resolved/finished.
     *
     * @return array<string>
     */
    public static function getTerminalStatuses(): array
    {
        return [
            self::REJECTED_ON_REVIEW->value,
            self::REJECTED_ON_APPROVAL->value,
            self::VOID->value,
            self::COMPLETE->value,
        ];
    }
}
