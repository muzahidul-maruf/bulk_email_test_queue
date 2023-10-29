<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SendMailController extends Controller
{
    public function index()
    {
        $details = [
            'subject' => 'Weekly Notification'
        ];

        // send all mail in the queue.
        $job = (new SendEmailJob($details))
            ->delay(
                now()
                    ->addSeconds(2)
            );

        dispatch($job);
        //SendEmailJob::dispatch($details)->onConnection('database');
        //SendEmailJob::dispatch($details)->onQueue('database');
        
        echo "Bulk mail send successfully in the background...";
    }
}
