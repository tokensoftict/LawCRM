<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Notifications\RemindCustomerForPassportNotification;
use Illuminate\Console\Command;

class CheckCustomerForEmptyPassport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:passport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command scans through customer table to look for customer without passport, passport column will be null.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking Customer without passport');

        $count = 0;
        $customers = Customer::whereNull('passport')->chunk(20, function ($customers) use (&$count) {

            foreach ($customers as $customer) {
                $customer->notify(new RemindCustomerForPassportNotification($customer));
                $count++;
            }

        });

        $this->info('Checking Complete');

        $this->info($count." passport reminder email has been queued successfully");

        return Command::SUCCESS;
    }
}
