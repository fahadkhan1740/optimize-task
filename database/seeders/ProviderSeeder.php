<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->truncate();

        DB::table('providers')->insert([
            [
                'name' => 'Google',
                'description' => '
                1. .jpg: Must be in aspect ratio 4:3 and < 2 mb size
                2. .mp4: < 1 minutes long
                3. .mp3: < 30 seconds long and < 5mb size
                ',
                'image_rules' => 'mimes:jpg;max:2000',
                'video_rules' => 'mimes:mp4;video_length:60'
            ], [
                'name' => 'Snapchat',
                'description' => '
                1. .jpg, .gif: Must be in aspect ratio 16:9 and < 5mb in size
                2. .mp4, .mov: < 50mb in size and < 5 minutes long
                ',
                'image_rules' => 'mimes:jpg,gif;max:5000',
                'video_rules' => 'mimes:mp4;max:50000;video_length:300'
            ]
        ]);
    }
}
