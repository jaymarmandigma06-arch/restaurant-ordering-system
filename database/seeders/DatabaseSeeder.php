<?php

namespace Database\Seeders;

use App\Models\{Category,Food,User};
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(['email'=>'admin@flamefork.test'],['name'=>'System Admin','phone'=>'09170000000','role'=>'admin','is_active'=>true,'password'=>Hash::make('Admin@12345')]);
        User::firstOrCreate(['email'=>'customer@flamefork.test'],['name'=>'Sample Customer','phone'=>'09171111111','role'=>'customer','is_active'=>true,'password'=>Hash::make('Customer@12345')]);
        $mains=Category::firstOrCreate(['slug'=>'mains'],['name'=>'Mains','description'=>'Hearty signature plates']);
        foreach ([['Classic Burger',189,30],['Chicken Alfredo',245,20],['Margherita Pizza',299,15]] as [$name,$price,$qty]) Food::firstOrCreate(['slug'=>str($name)->slug()],['category_id'=>$mains->id,'name'=>$name,'description'=>'Freshly prepared with quality ingredients.','price'=>$price,'quantity'=>$qty,'is_available'=>true,'is_featured'=>true]);
    }
}
