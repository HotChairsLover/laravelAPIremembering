<?php

namespace App\Jobs\TestChains;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

abstract class AbstractJob implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->onQueue('test-chains');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->debug('done');
    }

    protected function debug(string $msg)
    {
        $class = static::class;
        $msg = $msg . "[{$class}]";
        logs()->info($msg);
    }
}
