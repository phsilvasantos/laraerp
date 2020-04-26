<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super = new Company();
        $super->company_code = 'DEF';
        $super->company_name = 'Default';
        $super->company_owner = 'ABC';
        $super->company_phone = '0422222222';
        $super->company_fax = '0411111111';
        $super->company_email = 'default@gmail.com';
        $super->company_url = 'www.default.com';
        $super->company_ZipCode = '888';
        $super->company_address = '1111 Sanmin Road, North District, Taichung City';
        $super->company_GUInumber = '00000000';

        $super->save();

    }
}
