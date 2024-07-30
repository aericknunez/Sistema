<?php

namespace App\Console\Commands;

use App\Services\Push;
use Illuminate\Console\Command;

class ProcessPush extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:push';
    protected $description = 'Process the Push class to generate JSON files and send via POST';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $push = new Push();
        $result = $push->execute();
        $this->info($result);
    }
}
