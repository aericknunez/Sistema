<?php

namespace App\Jobs;

use App\Mail\EmailCorte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCorteEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
    public function handle()
    {

        $datos = ['nombre' => 'Erick Nunez'];
        Mail::to('erick@hibridosv.com')->send(new EmailCorte($datos));
    }
}
