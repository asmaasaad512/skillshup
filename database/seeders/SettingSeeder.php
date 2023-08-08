<?php

namespace Database\Seeders;

use App\Models\setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        setting::create([
         'email'=>'contact@gmail.com',
          'phone'=>'01016560604',
          'facebook'=>'https://www.facebook.com/facebook/?brand_redir=185150934832623',
          'whatsape'=>'https://web.whatsapp.com/',
          'twitter'=>'https://twitter.com/twitter?lang=ar',
          'instegram'=>'https://www.instagram.com/',
          'linkedin' =>'https://www.linkedin.com/'

          
        ]);
    }
}
