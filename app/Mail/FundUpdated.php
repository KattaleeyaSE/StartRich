<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\MutualFund;

class FundUpdated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The fund instance.
     *
     * @var MutualFund
     */
    public $fund;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(MutualFund $fund)
    {
        $this->fund = $fund;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.fund.updated');
    }
}
