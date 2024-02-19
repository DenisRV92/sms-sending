<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;

class get_data_from_google_sheets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'google:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Достаем данные из гугл таблицы';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $range = 'A2:Z';
        $apiKey = 'AIzaSyDqGOZbu-wLQnXYT4Oa-gIcv8n5sqZCmDk';
        $url = "https://sheets.googleapis.com/v4/spreadsheets/1C5j1wLng3jdRlDLNFz1XPDpWfnJX1sBqqhc5fiPENH4/values/$range?key=$apiKey";

        $response = file_get_contents($url);

        $data = json_decode($response, true);

        return $data['values'];
    }
}
