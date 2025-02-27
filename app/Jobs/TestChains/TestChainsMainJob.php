<?php

namespace App\Jobs\TestChains;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TestChainsMainJob extends AbstractJob
{
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->debug('start');

        TestChainsCacheJob::dispatchSync();

        $mainJobs = [
            new TestChainsFirstJob(),
            new TestChainsSecondJob(),
            new TestChainsThirdJob()
        ];

        $secondaryJobs = [
            new TestChainsAnotherJob(),
            new TestChainsAndAnotherJob()
        ];

        $chain = array_merge($mainJobs, $secondaryJobs);

        TestChainsChainStartJob::withChain($chain)->dispatch();

        $this->debug('finish');
    }
}
