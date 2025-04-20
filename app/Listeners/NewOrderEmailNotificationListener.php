<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Exceptions\Shop\Order\OrderNotificationMailException;
use App\Mail\Shop\NewOrderNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewOrderEmailNotificationListener implements ShouldQueue
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
    public function handle(OrderCreated $event): void
    {
        try {
            Mail::to('manager@manager.com')->send(new NewOrderNotificationMail($event->order));
        } catch (\Exception $e){
            throw new OrderNotificationMailException('Ошибка при отправке письма', 0, $e);
        }
    }
}
