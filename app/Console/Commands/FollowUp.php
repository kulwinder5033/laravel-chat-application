<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\FollowUp as ModelFollowUp;
use Illuminate\Console\Command;

class FollowUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'follow-up:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $datetime = now()->setTimezone('Asia/Kolkata')->format('Y-m-d H:i').':00';

        $follows = ModelFollowUp::where('follow_up_date',$datetime)->get();
        
        foreach ($follows as $follow) {
            $user = User::find($follow->sender_user_id);
            $user->notify(new \App\Notifications\FollowUpNotification($follow->message));
        }

        
    }
}
