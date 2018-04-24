<?php

namespace App\Console\Commands;
use App\Url;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
// use Mail;

class CheckStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending emails to the users when status of Url is down';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
     public function handle()
      {
        // to get the url that is equal zero which mean down
        $status = Url::where('status' , '=' , 0)->get();
        foreach($status as $st)
        {
          // send mail to user who is have url down
           $user = User::find($st->user_id);
           $contactEmail = $user->email;
           $subject = "Status of Url";
           Mail::send('url.test', ['name'=>$user->name], function ($message)  use ($contactEmail,$subject)
           {
                   $message->from('mis.fci90@gmail.com', 'Luxgems');
                   $message->to($contactEmail);
                   $message->subject($subject);
           });

         }
      }
}
