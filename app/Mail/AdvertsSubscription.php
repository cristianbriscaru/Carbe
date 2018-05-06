<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdvertsSubscription extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $advert;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $advert)
    {
        $this->user=$user;
        $this->advert=$advert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('subscriptions@carbe.co.uk')
                    ->markdown('emails.adverts-subscription');
    }
}
