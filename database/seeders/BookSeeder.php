<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'author_id' => 1,
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'description' => 'Harry Potter has no idea how famous he is. That\'s because he\'s being raised by his miserable aunt and uncle who are terrified Harry will learn that.',
                'cover' => '/assets/images/harry-potter-and-the-philosopers-stone.jpg',
                'is_published' => true,
            ],
            [
                'author_id' => 2,
                'title' => 'AOT: Toward the tree on that hill',
                'description' => 'Several hundred years ago, humans were nearly exterminated by Titans. Titans are typically several stories tall, seem to have no intelligence, devour human beings and, worst of all, seem to do it for the pleasure rather than as a food source.',
                'cover' => '/assets/images/34-toward-the-tree-on-that-hill.jpeg',
                'is_published' => false,
            ]
        ];

        foreach ($books as $book) {
            $cover_path = public_path($book['cover']); 
            
            if (file_exists($cover_path)) {
                $fileContents = file_get_contents($cover_path);

                $cover_path_in_storage = basename($cover_path);
                Storage::put($cover_path_in_storage, $fileContents);

                $book['cover'] = $cover_path_in_storage;
            }

            \App\Models\Book::create($book);
        }
    }
}
