<?php

use Illuminate\Database\Seeder;
use App\Model\Item;
use App\Model\Logistic;
use App\Model\OtherVendor;
use Carbon\Carbon;
use App\Model\Branch;
use App\Model\Commissary;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        

        for ($i=1; $i < 99 ; $i++) { 
            Item::create([
                'chart_account_id' => rand(1, 633),
                'itemable_id' => $i,
                'itemable_type' => 'App\Model\Branch',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
                'minimum' =>  rand(20, 200),
                'maximum' =>  rand(300, 5000),
                'reorder_level' => rand(1, 100)
            ]);
            Item::create([
                'chart_account_id' => rand(1, 633),
                'itemable_id' => rand(1, 99),
                'itemable_type' => 'App\Model\Branch',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
                'minimum' =>  rand(20, 200),
                'maximum' =>  rand(300, 5000),
                'reorder_level' => rand(1, 100)
            ]);
            Item::create([
                'chart_account_id' => rand(1, 633),
                'itemable_id' => rand(1, 99),
                'itemable_type' => 'App\Model\Branch',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
                'minimum' =>  rand(20, 200),
                'maximum' =>  rand(300, 5000),
                'reorder_level' => rand(1, 100)
            ]);

            Item::create([
                'chart_account_id' => rand(1, 633),
                'itemable_id' => $i,
                'itemable_type' => 'App\Model\Logistic',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
                'minimum' =>  rand(20, 200),
                'maximum' =>  rand(300, 5000),
                'reorder_level' => rand(1, 100)
            ]);
            Item::create([
                'chart_account_id' => rand(1, 633),
                'itemable_id' => rand(1, 99),
                'itemable_type' => 'App\Model\Logistic',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
                'minimum' =>  rand(20, 200),
                'maximum' =>  rand(300, 5000),
                'reorder_level' => rand(1, 100)
            ]);
            Item::create([
                'chart_account_id' => rand(1, 633),
                'itemable_id' => rand(1, 99),
                'itemable_type' => 'App\Model\Logistic',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
                'minimum' =>  rand(20, 200),
                'maximum' =>  rand(300, 5000),
                'reorder_level' => rand(1, 100)
            ]);
            Item::create([
                'chart_account_id' => rand(1, 633),
                'itemable_id' => $i,
                'itemable_type' => 'App\Model\Commissary',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
                'minimum' =>  rand(20, 200),
                'maximum' =>  rand(300, 5000),
                'reorder_level' => rand(1, 100)
            ]);
            Item::create([
                'chart_account_id' => rand(1, 633),
                'itemable_id' => rand(1, 99),
                'itemable_type' => 'App\Model\Commissary',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
                'minimum' =>  rand(20, 200),
                'maximum' =>  rand(300, 5000),
                'reorder_level' => rand(1, 100)
            ]);
        }

        for($a=1; $a < 98; $a++) {

            $logistic = Logistic::find($a);
            $item = Item::find($a);
            $item->logistics()->attach($logistic->id, [
                'rank' => rand(1, 3),
                'dis_percentage' => rand(10, 90),
                'start_date' => Carbon::now(),
                'end_date' => Carbon::tomorrow('Europe/London'),
                'volume' => rand(200, 3000),
                'price' => rand(1, 1000),
                'freight' => rand(1, 1000),
                'terms' => rand(1, 30),
                'remarks' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'created_by' => rand(1, 98),
                'approved_by'   => rand(1, 98)
            ]);

        }

        for($a=1; $a < 98; $a++) {

            $branch = Branch::find($a);
            $item = Item::find($a);
            $item->branches()->attach($branch->id, [
                'rank' => rand(1, 3),
                'dis_percentage' => rand(10, 90),
                'start_date' => Carbon::now(),
                'end_date' => Carbon::tomorrow('Europe/London'),
                'volume' => rand(200, 3000),
                'price' => rand(1, 1000),
                'freight' => rand(1, 1000),
                'terms' => rand(1, 30),
                'remarks' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'created_by' => rand(1, 98),
                'approved_by'   => rand(1, 98)
            ]);

        }

        for($a=1; $a < 98; $a++) {

            $commissary = Commissary::find($a);
            $item = Item::find($a);
            $item->commissaries()->attach($commissary->id, [
                'rank' => rand(1, 3),
                'dis_percentage' => rand(10, 90),
                'start_date' => Carbon::now(),
                'end_date' => Carbon::tomorrow('Europe/London'),
                'volume' => rand(200, 3000),
                'price' => rand(1, 1000),
                'freight' => rand(1, 1000),
                'terms' => rand(1, 30),
                'remarks' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'created_by' => rand(1, 98),
                'approved_by'   => rand(1, 98)
            ]);

        }

        for($a=1; $a < 98; $a++) {

            $otherVendor = OtherVendor::find($a);
            $item = Item::find($a);
            $item->otherVendors()->attach($otherVendor->id, [
                'rank' => rand(1, 3),
                'dis_percentage' => rand(1, 50),
                'start_date' => Carbon::now(),
                'end_date' => Carbon::tomorrow('Europe/London'),
                'volume' => rand(1, 50),
                'price' => rand(1, 1000),
                'freight' => rand(1, 500),
                'terms' => rand(1, 30),
                'remarks' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'created_by' => rand(1, 98),
                'approved_by'   => rand(1, 98)
            ]);

        }
    }
}
