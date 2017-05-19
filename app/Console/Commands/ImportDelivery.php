<?php

namespace App\Console\Commands;

use App\District;
use App\Store;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportDelivery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:delivery';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import delivery';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $excelFile = resource_path('assets/delivery/phan_phoi.xlsx');

        $excelData = [];

        Excel::load($excelFile, function($reader) use (&$excelData) {
            // Getting all results
            $results = $reader->get();
            foreach ($results as $sheet) {
                // Loop through all rows
                $excelData[] = $sheet;
            }
        });

       //dd($excelData[1]);

        DB::table('stores')->truncate();

        foreach ($excelData as $row) {
           if ($row->quan_huyen) {
               $existDistrict = District::findBySlug(str_slug($row->quan_huyen));

               if ($existDistrict && trim($row->nha_thuoc) && $row->dia_chi && $row->sdt) {
                   Store::create([
                       'district_id' => $existDistrict->id,
                       'name' => trim($row->nha_thuoc),
                       'address' => $row->dia_chi,
                       'phone' => $row->sdt
                   ]);
               } else {
                   \Log::info('quan huyen:'.$row->quan_huyen.' not match in database');
               }
           }
        }

    }
}
