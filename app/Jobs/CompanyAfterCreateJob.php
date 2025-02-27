<?php

namespace App\Jobs;

use App\Models\Company;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;

class CompanyAfterCreateJob implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels;

    private $company;

    /**
     * Create a new job instance.
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logs()->info('Создана компания: ['.$this->company->id.'] '.$this->company->name);
    }
}
