<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendEmailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user = $event->getUser();

        $order = $event->getOrder();

        #$order_items = OrderItem::find($order->id);

        #dd($order_items);

        Mail::send('emails.checkout', ['user' => $user, 'order' => $order], function ($message) use ($user, $order) 
            {
                $message->from('codecommerce@contact.com', 'CodeCommerce');
                $message->to($user->email, $user->name)->subject("Pedido #$order->id - Checkout");
            });

    }
}
