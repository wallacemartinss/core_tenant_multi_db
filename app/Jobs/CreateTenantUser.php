<?php

namespace App\Jobs;

use App\Models\{Tenant, User};
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreateTenantUser implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Tenant $tenant)
    {
        //
    }

    /**
     * Execute the job.
     * Create a new user for the tenant
     */
    public function handle(): void
    {
        $this->tenant->run(function () {
            User::create([
                'name'              => $this->tenant->name,
                'email'             => $this->tenant->email,
                'password'          => $this->tenant->password,
                'email_verified_at' => now(),
            ]);
        });
    }
}
