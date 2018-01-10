<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class ExcelParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:parse {--limit=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'parse';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function handlePhoneNumber($phone)
    {
        try {
            $phone = preg_replace('/\D/', '', $phone);

            $firstStr = substr($phone, 0, 2);

            $correctNumber = null;
            if ($firstStr == '01') {
                $correctNumber = substr($phone, 0, 11);
            } else if ($firstStr == '84') {
                $nextString = substr($phone, 2, 1);
                if ($nextString === '1') {
                    $correctNumber = substr($phone, 0, 12);
                } else {
                    $correctNumber = substr($phone, 0, 11);
                }
            } else {
                $correctNumber = substr($phone, 0, 10);
            }

            return $correctNumber;
        } catch (\Exception $e) {
            \Log::error('Error send:sms handlePhoneNumber at' . Carbon::now());

            return false;
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $limit = $this->option('limit');

        $records = \DB::connection('excel')->table('Mobi1')->whereNull('format_phone')->get();

        foreach ($records as $record) {
            $phone = "+84".$this->handlePhoneNumber($record->phone);
            \DB::connection('excel')->table('Mobi1')
                ->where('id', $record->id)
                ->update(['format_phone' => $phone]);
        }

    }
}
