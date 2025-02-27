<?php

namespace App\Console\Commands;

use App\Jobs\TestChains\TestChainsMainJob;
use Illuminate\Console\Command;

class testchains extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testchains';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запуск тестирования цепочек';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        TestChainsMainJob::dispatch();
    }
}
