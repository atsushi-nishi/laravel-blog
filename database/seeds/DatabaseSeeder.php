<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('AdminUserTableSeeder');
        $this->call('BlogAndBlogTagTableSeeder');

        if( App::environment() === 'testing' ) {
            // Add More Seed For Testing
        }

        Model::reguard();
    }
}
