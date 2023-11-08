<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author_names = ['J.K. Rowling', 'Hajime Isayama'];

        foreach ($author_names as $name) {
            \App\Models\Author::create([
                'name' => $name,
            ]);
        }
    }
}
