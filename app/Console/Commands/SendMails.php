<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class SendMails extends Command
{
    protected $signature = 'mail:me';
    protected $description = 'Sends mail to me every morning';
    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        Mail::send('emails.reminder', [],function($message){
            $message->to('ahmed.raza@square63.com');
        });
    }
}
