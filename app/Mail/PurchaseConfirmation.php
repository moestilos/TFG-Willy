<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $cartItems;
    public $total;

    public function __construct($cartItems, $total)
    {
        $this->cartItems = $cartItems;
        $this->total = $total;
    }

    public function build()
    {
        return $this->subject('Confirmación de Compra - PunkMoes')
                    ->view('emails.purchase-confirmation');
    }
}
