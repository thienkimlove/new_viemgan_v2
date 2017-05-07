<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $countProvinces = DB::table('provinces')->count();

        if ($countProvinces == 0) {
            $provinceJson = resource_path('assets/sql/provinces.json');
            $provinces = json_decode(file_get_contents($provinceJson), true);

            foreach ($provinces as $province) {
                DB::table('provinces')->insert([
                    'id' => $province['id'],
                    'name' => $province['name'],
                    'slug' => str_slug($province['name']),
                    'created_at' => $province['created_at'],
                    'updated_at' => $province['updated_at'],
                ]);
            }
        }

        $countDistricts = DB::table('districts')->count();

        if ($countDistricts == 0) {
            $districtJson = resource_path('assets/sql/districts.json');
            $districts = json_decode(file_get_contents($districtJson), true);

            foreach ($districts as $district) {
                DB::table('districts')->insert([
                    'id' => $district['id'],
                    'name' => $district['name'],
                    'slug' => str_slug($district['name']),
                    'province_id' => $district['province_id'],
                    'created_at' => $district['created_at'],
                    'updated_at' => $district['updated_at'],
                ]);
            }
        }

        DB::table('provinces')->where('id', '<', 43)->update([
            'domain' => 'Miền Bắc'
        ]);

        DB::table('provinces')->where('id', '>', 43)->where('id', '<', 55)->update([
            'domain' => 'Miền Trung'
        ]);

        DB::table('provinces')->where('id', '>', 55)->update([
            'domain' => 'Miền Nam'
        ]);

        $countStores = DB::table('stores')->count();

        if ($countStores == 0) {

            $districts = \App\District::where('province_id', 1)->pluck('id');

            for ($i = 1; $i < 10; $i ++) {

                $random = rand(0, count($districts));

                DB::table('stores')->insert([
                    'name' => 'Nha thuoc '.$i,
                    'slug' => str_slug('Nha thuoc '.$i),
                    'address' => 'Address '.$i,
                    'phone' => '090334719'.$i,
                    'district_id' => $districts[$random]
                ]);
            }
        }
    }
}
