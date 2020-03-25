<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class TestMultiTenantJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $retryAfter = 10;

    public $tries = 3;

    public $website_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $website_id)
    {
        $this->website_id = $website_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = "==== TestMultiTenantJob->handle() START =====";
        Log::debug($message);
        echo $message."\n";

        try {
            $message = "Website ID  is: ".$this->website_id;
            Log::debug($message);
            echo $message."\n";

            $admin = User::where("name", "admin")->first();
            if (!$admin) {
                throw new \Exception("User admin not found, please execute command `php artisan tenancy:db:seed --website_id=<YOUR_WEBSITE_ID>`");
            }

            $message = "The admin email is: ".$admin->email;
            Log::debug($message);
            echo $message."\n";

            $message = "The app_name configured in setting() is: ".setting("app_name");
            Log::debug($message);
            echo $message."\n";

        } catch (\Exception $e) {
            // Log::info($e->getTraceAsString());
            $this->release($this->retryAfter);

            $message = "==== TestMultiTenantJob->handle() ERROR =====";
            Log::debug($message);
            echo $message."\n";

            throw $e;
        }

        $message = "==== TestMultiTenantJob->handle() SUCCESS =====";
        Log::debug($message);
        echo $message."\n";
    }
}
