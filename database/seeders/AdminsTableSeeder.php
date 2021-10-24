<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([
            'name'      =>  'Ritesh Jangir',
            'email'     =>  'admin@admin.com',
            'mobile'    =>  '758123306',
            'password'  =>  Hash::make('admin')
        ]);
    }
}
