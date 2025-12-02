<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast; // <-- Added Interface
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Requests;
use Illuminate\Broadcasting\PrivateChannel;

class RequestStatusUpdated implements ShouldBroadcast // <-- Implementing ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The Request model instance.
     *
     * @var \App\Models\Requests
     */
    public Requests $request;

    public function __construct(Requests $request)
    {
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     * We'll use a Private Channel to ensure only authorized users can receive the update.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // Broadcasts the event on a private channel specific to the status management dashboard
        return [
            new PrivateChannel('requests.status.manager'),
        ];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'status.updated';
    }

    /**
     * Get the data to broadcast.
     * By default, Laravel broadcasts all public properties, but you can customize it here.
     * * @return array<string, mixed>
     */
    public function broadcastWith(): array
    {
        return [
            // Returns the model data, including the new status
            'request' => $this->request->load('requestedBy', 'approval'),
            'new_status' => $this->request->status->value,
        ];
    }
}
