<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use function Laravel\Prompts\pause;

class logJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    protected $count;
    public function __construct(int $count)
    {
        $this->count = $count;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for ($i = 0; $i < $this->count; $i++) {
            error_log($i);
            sleep(1);
        }
    }
}
