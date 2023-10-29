<?php

namespace App\Jobs;

use App\Mail\BulkEmailSend;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendEmailTest;
use App\Models\User;
use Mail;

class SendEmailJob implements ShouldQueue
{
    // use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // protected $details;

    // /**
    //  * Create a new job instance.
    //  *
    //  * @return void
    //  */
    // public function __construct($details)
    // {
    //     $this->details = $details;
    // }

    // /**
    //  * Execute the job.
    //  *
    //  * @return void
    //  */
    // public function handle()
    // {
    //     $email = new BulkEmailSend();
    //     Mail::to($this->details['email'])->send($email);
    // }

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = User::all();
        $input['subject'] = $this->details['subject'];

        foreach ($data as $key => $value) {
            $input['email'] = $value->email;
            $input['name'] = $value->name;
            Mail::send('emails.test', [], function ($message) use ($input) {
                $message->to($input['email'], $input['name'])
                    ->subject($input['subject']);
            });
        }
    }
}
