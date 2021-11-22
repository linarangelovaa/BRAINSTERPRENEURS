<?php

namespace Database\Seeders;

use App\Models\Academy;
use Illuminate\Database\Seeder;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Academy::insert([
            [
                'name' => 'Backend Development'
            ],
            [
                'name' => 'Frontend Development'
            ],
            [
                'name' => 'Marketing'
            ],
            [
                'name' => 'Data Science'
            ],
            [
                'name' => 'Design'
            ],
            [
                'name' => 'QA'
            ],
            [
                'name' => 'UX/UI'
            ]
        ]);
    }
}