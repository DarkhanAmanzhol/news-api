<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsCategory::create(['name' => 'Политика']);
        NewsCategory::create(['name' => 'Религия']);
        NewsCategory::create(['name' => 'Экономика']);
        NewsCategory::create(['name' => 'Спорт']);
        NewsCategory::create(['name' => 'Наука и технологии']);
    }
}
