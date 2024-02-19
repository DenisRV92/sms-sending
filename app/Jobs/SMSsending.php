<?php

namespace App\Jobs;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SMSsending implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $today = Carbon::now();
        $nextWeek = $today->addDays(7);
        $phones = User::where('birthday', 'LIKE', '%' . $nextWeek->format('d.m') . '%')->get()->pluck('phone')->all();

        Http::get('https://smsc.ru/sys/jobs.php',
            [
                'add' => 1,
                'login' => env('LOGIN'),
                'psw' => env('PASSWORD'),
                'phones' => implode(",", $phones),
                'name' => 'Privet',
                'mes' => 'Привет',
            ]);

    }
}
