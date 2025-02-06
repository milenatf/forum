<?php

namespace App\Listeners;

use App\Events\QuestionReplied;
use App\Mail\QuestionRepliedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendQuestionRepliedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(QuestionReplied $event): void
    {
        Mail::to($event->user)->send(new QuestionRepliedMail($event->createdReply));
    }
}
