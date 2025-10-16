<?php

namespace App\Listeners;

use App\Models\Shopingcartdetails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use cache;

class ShopingcartCacheListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        cache()->forget('shopingcartdetails'); //forget all the cache data initially 

        $shopingcartCreated = Shopingcartdetails::all(); //fetch all data

        cache()->forever('shopingcartdetails', $shopingcartCreated); // and put them into cache forever
    }
}
