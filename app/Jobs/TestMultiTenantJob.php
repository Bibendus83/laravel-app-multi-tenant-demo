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
        try {
            $admin = User::where("name", "admin")->first();
            if (!$admin) {
                throw new \Exception("User admin not found, please execute command `php artisan tenancy:db:seed --website_id=<YOUR_WEBSITE_ID>`");
            }

            $message = "Website ID  is: ".$this->website_id;
            Log::debug($message);
            echo $message."\n<br>\n";

            $message = "The admin email is: ".$admin->email;
            Log::debug($message);
            echo $message."\n<br>\n";

            $message = "The app_name configured in setting() is: ".setting("app_name");
            Log::debug($message);
            echo $message."\n<br>\n";

        } catch (\Exception $e) {
            Log::info($e->getTraceAsString());
            $this->release(60);

            throw $e;
        }
    }
}
