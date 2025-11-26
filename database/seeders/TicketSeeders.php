<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tickets;
use App\Models\User;
use Carbon\Carbon;

class TicketSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get some existing users for foreign keys
        $userIds = User::pluck('employee_id')->toArray();

        // Create 7 tickets with random data
        foreach (range(1, 7) as $index) {
            Tickets::create([
                // Submission Phase
                'requested_by_id' => $this->getRandomUserId($userIds),
                'requested_date' => Carbon::now()->subDays(rand(1, 30)),
                'needed_date' => Carbon::now()->addDays(rand(1, 15)),
                'requested_cat' => $this->getRandomCategory(),
                'requested_details' => $this->generateRandomText(),
                'request_type' => $this->getRandomRequestType(),
                'status' => $this->getRandomStatus(),

                // Review/Assignment Phase (can be null)
                'ticket_number' => 'TICKET-' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT),
                'datetime_received' => Carbon::now()->subDays(rand(0, 30))->addHours(rand(0, 23)),
                'received_by_id' => $this->getRandomUserId($userIds),
                'acknowledge_by_id' => $this->getRandomUserId($userIds),
                'approximate_date' => Carbon::now()->addDays(rand(1, 7)),
                'estimate_days' => rand(1, 10),
                'assigned_to_id' => $this->getRandomUserId($userIds),
                'datetime_started' => Carbon::now()->subDays(rand(0, 5)),
                'datetime_finished' => Carbon::now()->addDays(rand(1, 10)),
                'detailed_description' => $this->generateRandomText(),
                'findings' => $this->generateRandomText(),
                'action_taken' => $this->generateRandomText(),

                // Approval Phase (can be null)
                'reviewed_by_id' => $this->getRandomUserId($userIds),
                'approved_by_id' => $this->getRandomUserId($userIds),
                'enduser_acceptance_id' => $this->getRandomUserId($userIds),
            ]);
        }
    }

    /**
     * Get a random user ID from the provided user IDs array.
     *
     * @param array $userIds
     * @return mixed
     */
    private function getRandomUserId($userIds)
    {
        return $userIds[array_rand($userIds)];
    }

    /**
     * Get a random category for the requested ticket.
     *
     * @return string
     */
    private function getRandomCategory()
    {
        $categories = ['Hardware', 'Software', 'Network', 'Support', 'Maintenance'];
        return $categories[array_rand($categories)];
    }

    /**
     * Get a random request type for the ticket.
     *
     * @return string
     */
    private function getRandomRequestType()
    {
        $types = ['Issue', 'Request', 'Change', 'Incident'];
        return $types[array_rand($types)];
    }

    /**
     * Generate some random text for descriptions or details.
     *
     * @return string
     */
    private function generateRandomText()
    {
        return \Faker\Factory::create()->paragraph();
    }

    /**
     * Get a random ticket status.
     *
     * @return string
     */
    private function getRandomStatus()
    {
        $statuses = ['Open', 'In Progress', 'Completed', 'On Hold', 'Cancelled'];
        return $statuses[array_rand($statuses)];
    }
}
