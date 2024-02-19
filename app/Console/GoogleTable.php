<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Command;

class GoogleTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get_data_google_table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data google table';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        dd('sss');
    }
}
