<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPostEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    protected $email;
    protected $description;
    protected $title;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $title, $description)
    {
        $this->email= $email;
        $this->title= $title;
        $this->description= $description;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::raw($this->description, function($message){
            $message->to($this->email)
                    ->subject($this->title);
        });
    }
}
