<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('users')->delete();
        
        DB::table('users')->insert(array (
            0 => 
            array (
                'name' => 'Ali Alaa',
                'email' => 'admin@demo.com',
                'password' => bcrypt('123456'),
                'api_token' => 'PivvPlsQWxPl1bB5KrbKNBuraJit0PrUZekQUgtLyTRuyBq921atFtoR1HuA',
                'remember_token' => 'T4PQhFvBcAA7k02f7ejq4I7z7QKKnvxQLV0oqGnuS6Ktz6FdWULrWrzZ3oYn',
                'created_at' => '2018-08-06 22:58:41',
                'updated_at' => '2019-09-27 07:49:45',
                'braintree_id' => NULL,
                'paypal_email' => NULL,
                'stripe_id' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'trial_ends_at' => NULL,
                'device_token' => NULL,
            ),
            1 => 
            array (
                'name' => 'Barbara J. Glanz',
                'email' => 'manager@demo.com',
                'password' => bcrypt('123456'),
                'api_token' => 'tVSfIKRSX2Yn8iAMoUS3HPls84ycS8NAxO2dj2HvePbbr4WHorp4gIFRmFwB',
                'remember_token' => '5nysjzVKI4LU92bjRqMUSYdOaIo1EcPC3pIMb6Tcj2KXSUMriGrIQ1iwRdd0',
                'created_at' => '2018-08-14 17:06:28',
                'updated_at' => '2019-09-25 22:09:35',
                'braintree_id' => NULL,
                'paypal_email' => NULL,
                'stripe_id' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'trial_ends_at' => NULL,
                'device_token' => NULL,
            ),
            2 => 
            array (
                'name' => 'Charles W. Abeyta',
                'email' => 'client@demo.com',
                'password' => bcrypt('123456'),
                'api_token' => 'fXLu7VeYgXDu82SkMxlLPG1mCAXc4EBIx6O5isgYVIKFQiHah0xiOHmzNsBv',
                'remember_token' => 'V6PIUfd8JdHT2zkraTlnBcRSINZNjz5Ou7N0WtUGRyaTweoaXKpSfij6UhqC',
                'created_at' => '2019-10-12 22:31:26',
                'updated_at' => '2020-03-29 17:44:30',
                'braintree_id' => NULL,
                'paypal_email' => NULL,
                'stripe_id' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'trial_ends_at' => NULL,
                'device_token' => NULL,
            ),
            3 => 
            array (
                'name' => 'Robert E. Brock',
                'email' => 'client1@demo.com',
                'password' => bcrypt('123456'),
                'api_token' => 'Czrsk9rwD0c75NUPkzNXM2WvbxYHKj8p0nG29pjKT0PZaTgMVzuVyv4hOlte',
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
                'braintree_id' => NULL,
                'paypal_email' => NULL,
                'stripe_id' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'trial_ends_at' => NULL,
                'device_token' => NULL,
            ),
            4 => 
            array (
                'name' => 'Sanchez Roberto',
                'email' => 'driver@demo.com',
                'password' => bcrypt('123456'),
                'api_token' => 'OuMsmU903WMcMhzAbuSFtxBekZVdXz66afifRo3YRCINi38jkXJ8rpN0FcfS',
                'remember_token' => NULL,
                'created_at' => '2019-12-15 18:49:44',
                'updated_at' => '2020-03-29 17:22:10',
                'braintree_id' => NULL,
                'paypal_email' => NULL,
                'stripe_id' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'trial_ends_at' => NULL,
                'device_token' => NULL,
            ),
            5 => 
            array (
                'name' => 'John Doe',
                'email' => 'driver1@demo.com',
                'password' => bcrypt('123456'),
                'api_token' => 'zh9mzfNO2iPtIxj6k4Jpj8flaDyOsxmlGRVUZRnJqOGBr8IuDyhb3cGoncvS',
                'remember_token' => NULL,
                'created_at' => '2020-03-29 17:28:04',
                'updated_at' => '2020-03-29 17:28:04',
                'braintree_id' => NULL,
                'paypal_email' => NULL,
                'stripe_id' => NULL,
                'card_brand' => NULL,
                'card_last_four' => NULL,
                'trial_ends_at' => NULL,
                'device_token' => NULL,
            ),
        ));
        
        
    }
}