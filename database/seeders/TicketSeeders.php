<?php

namespace Database\Seeders;

use App\Models\Tickets;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class TicketSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Workflow IDs ---
        $requestorId = 'PPC1102'; // Hannah Lei Agustin (Requestor)
        $reviewerId = 'PPC0000'; // Users Manager (Department Manager/Reviewer)
        $approverId = 'PPC0004'; // IT Manager (Final Approver)
        $receiverIds = ['PPC0002', 'PPC0003']; // Supervisor or IT Consultant (Receiver/Triage)
        $assigneeIds = ['PPC0001', 'PPC1187']; // IT Specialist or System Analyst (Assignee)

        // --- Request Type Definitions ---
        $technicalDetails = null;
        $technicalTypes = [
            "Programs/Application Installation/Re-Install", "Peripheral Devices/Replacement",
            "Desktop Computer/Replacement", "Active Directory Users and Computers",
            "No Internet/New Network Connections", "New Email/Email Concern",
            "Files Backup/Restore/Access/Transfer", "Anti-virus",
            "Printer/Scanner", "Wifi Connection", "Others"
        ];

        $softwareDetails = [
            "ERP Syteline System", "HRIS", "TRE", "New Report", "SFMS", "Others"
        ];
        $softwareTypes = [
            "Modification/Enhancement", "Maintenance/System Error", "New Project", "Others"
        ];

        // --- 10 TICKET SCENARIOS ---
        $ticketsData = [
            // 1. DONE - Technical Request (Completed)
            [
                'status' => 'Done',
                'requested_cat' => 'Technical',
                'requested_details' => $technicalDetails,
                'request_type' => $technicalTypes[2], // Desktop Computer/Replacement
                'detailed_description' => 'My CPU is failing to boot past the BIOS screen. It requires replacement or repair.',
                'receiver_id' => 'PPC0002', // Supervisor
                'assigned_to_id' => 'PPC0001', // IT Specialist
                'findings' => 'HDD failure confirmed. Replaced the drive and re-imaged the OS.',
                'action_taken' => 'Replaced computer unit, transferred files, and confirmed network connectivity.',
            ],
            // 2. FOR APPROVAL - Software Request
            [
                'status' => 'For Approval',
                'requested_cat' => 'Software',
                'requested_details' => $softwareDetails[0], // ERP Syteline System
                'request_type' => $softwareTypes[1], // Maintenance/System Error
                'detailed_description' => 'The Sales Order creation module in Syteline is throwing an "Inventory Lock" error when saving.',
                'receiver_id' => 'PPC0003', // IT Consultant
                'assigned_to_id' => null,
            ],
            // 3. REJECTED - Technical Request (Rejected by Reviewer)
            [
                'status' => 'Rejected on Review',
                'requested_cat' => 'Technical',
                'requested_details' => $technicalDetails,
                'request_type' => $technicalTypes[3], // Active Directory
                'detailed_description' => 'Need a temporary account created for a contractor starting tomorrow.',
                'receiver_id' => $reviewerId,
                'review_rejected_notes' => 'Contractor accounts must be approved by HR first. Please provide the HR approval ticket.',
                'approved_by_id' => null,
                'assigned_to_id' => null,
            ],
            // 4. FOR REVIEW - Software Request (Pending Review)
            [
                'status' => 'For Review',
                'requested_cat' => 'Software',
                'requested_details' => $softwareDetails[3], // New Report
                'request_type' => $softwareTypes[2], // New Project
                'detailed_description' => 'We need a new dashboard report to track YTD sales by region, linked to the SFMS database.',
                'receiver_id' => null,
                'reviewed_by_id' => null,
                'approved_by_id' => null,
                'assigned_to_id' => null,
            ],
            // 5. ASSIGNED - Technical Request (In Progress)
            [
                'status' => 'Assigned',
                'requested_cat' => 'Technical',
                'requested_details' => $technicalDetails,
                'request_type' => $technicalTypes[4], // No Internet/New Network Connections
                'detailed_description' => 'The network port in the new employee cubicle (Cubicle 15) is inactive. Needs activation.',
                'receiver_id' => 'PPC0002', // Supervisor
                'assigned_to_id' => 'PPC1187', // System Analyst
                'findings' => 'Port 15 requires patching in the server room. Work is in progress.',
                'action_taken' => null,
            ],
            // 6. DONE - Software Request (Completed)
            [
                'status' => 'Done',
                'requested_cat' => 'Software',
                'requested_details' => $softwareDetails[1], // HRIS
                'request_type' => $softwareTypes[0], // Modification/Enhancement
                'detailed_description' => 'The Leave Request module in HRIS needs to be updated to support the new long-service leave policy.',
                'receiver_id' => 'PPC0003', // IT Consultant
                'assigned_to_id' => 'PPC1187', // System Analyst
                'findings' => 'Code modified and deployed to staging. Regression tests passed.',
                'action_taken' => 'Deployed changes to production and verified with HR department.',
            ],
            // 7. FOR REVIEW - Technical Request (New Submission)
            [
                'status' => 'For Review',
                'requested_cat' => 'Technical',
                'requested_details' => $technicalDetails,
                'request_type' => $technicalTypes[8], // Printer/Scanner
                'detailed_description' => 'The multi-function printer in the Marketing wing is constantly reporting a paper jam error, but no paper is stuck.',
                'receiver_id' => null,
                'reviewed_by_id' => null,
                'approved_by_id' => null,
                'assigned_to_id' => null,
            ],
            // 8. FOR APPROVAL - Technical Request (Awaiting final sign-off)
            [
                'status' => 'For Approval',
                'requested_cat' => 'Technical',
                'requested_details' => $technicalDetails,
                'request_type' => $technicalTypes[0], // Programs/Application Installation
                'detailed_description' => 'Need to install a specialized CAD viewer program for a new vendor partnership.',
                'receiver_id' => 'PPC0002', // Supervisor
                'assigned_to_id' => null,
            ],
            // 9. ASSIGNED - Software Request (In Progress)
            [
                'status' => 'Assigned',
                'requested_cat' => 'Software',
                'requested_details' => $softwareDetails[4], // SFMS
                'request_type' => $softwareTypes[1], // Maintenance/System Error
                'detailed_description' => 'The SFMS report generation tool times out when trying to pull data for more than two quarters.',
                'receiver_id' => 'PPC0003', // IT Consultant
                'assigned_to_id' => 'PPC0001', // IT Specialist
                'findings' => 'Identified slow query in the database. Working on query optimization.',
                'action_taken' => null,
            ],
            // 10. REJECTED - Software Request (Rejected by Reviewer)
            [
                'status' => 'Rejected on Review',
                'requested_cat' => 'Software',
                'requested_details' => $softwareDetails[5], // Others
                'request_type' => $softwareTypes[3], // Others
                'detailed_description' => 'Requesting a minor visual update to the company intranet homepage banner for the holiday season.',
                'receiver_id' => $reviewerId,
                'review_rejected_notes' => 'This request should be directed to the Corporate Communications team, not IT for software maintenance.',
                'approved_by_id' => null,
                'assigned_to_id' => null,
            ],
        ];

        foreach ($ticketsData as $key => $data) {
            $requestedDate = Carbon::now()->subDays(rand(1, 30));
            $neededDate = Carbon::parse($requestedDate)->addDays(rand(2, 14));

            // Workflow logic
            $currentReviewer = in_array($data['status'], ['For Review', 'Rejected on Review']) ? $reviewerId : $data['receiver_id'];
            $reviewedAt = $data['status'] !== 'For Review' ? $requestedDate->copy()->addHours(rand(1, 4)) : null;

            $currentApprover = in_array($data['status'], ['For Approval', 'Approved', 'Assigned', 'Done']) ? $approverId : null;
            $approvedAt = in_array($data['status'], ['Approved', 'Assigned', 'Done']) ? $reviewedAt->copy()->addHours(rand(1, 4)) : null;

            $ticketNumber = in_array($data['status'], ['Approved', 'Assigned', 'Done']) ? 'TKT' . str_pad($key + 1, 4, '0', STR_PAD_LEFT) : null;
            $datetimeReceived = $approvedAt ? $approvedAt->copy()->addMinutes(rand(10, 60)) : null;
            $datetimeStarted = $data['assigned_to_id'] ? $datetimeReceived->copy()->addHours(rand(1, 4)) : null;
            $datetimeFinished = $data['status'] === 'Done' ? $datetimeStarted->copy()->addDays(rand(1, 3)) : null;
            $endUserAcceptanceId = $data['status'] === 'Done' ? $requestorId : null;

            Tickets::create([
                // I. Submission Phase
                'requested_by_id' => $requestorId,
                'needed_date' => $neededDate,
                'requested_cat' => $data['requested_cat'],
                'requested_details' => $data['requested_details'],
                'request_type' => $data['request_type'],
                'detailed_description' => $data['detailed_description'],
                'status' => $data['status'],
                'review_key' => Str::uuid(),

                // II. Review & Approval Phase
                'received_by_id' => $data['receiver_id'],
                'reviewed_by_id' => $currentReviewer,
                'review_at' => $reviewedAt,
                'review_rejected_notes' => $data['review_rejected_notes'] ?? null,
                'approved_by_id' => $currentApprover,
                'approved_at' => $approvedAt,
                'approve_key' => $currentApprover ? Str::uuid() : null,
                'approval_rejected_notes' => $data['approval_rejected_notes'] ?? null,
                'acknowledge_by_id' => $data['receiver_id'],

                // III. Assignment & Work Phase
                'ticket_number' => $ticketNumber,
                'assigned_to_id' => $data['assigned_to_id'],
                'datetime_received' => $datetimeReceived,
                'datetime_started' => $datetimeStarted,
                'datetime_finished' => $datetimeFinished,
                'findings' => $data['findings'] ?? null,
                'action_taken' => $data['action_taken'] ?? null,

                // IV. End-User Acceptance Phase
                'enduser_acceptance_id' => $endUserAcceptanceId,

                // Laravel Timestamps
                'created_at' => $requestedDate,
                'updated_at' => Carbon::now(),
            ]);
        }

        $this->command->info('Ticket seeding complete! 10 tickets created using the refined workflow.');
    }
}
