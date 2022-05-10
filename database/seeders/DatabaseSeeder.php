<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Bakti Sosial',
            'slug' => 'bakti-sosial'
        ]);
        Category::create([
            'name' => 'Kegiatan Forum',
            'slug' => 'kegiatan-forum'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-Design'
        ]);


        DB::table('admin')->insert([
            'name' => Str::random(10),
            'role' => 'sa',
            'email' => 'sa@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'image.png',
        ]);
        DB::table('admin')->insert([
            'name' => Str::random(10),
            'role' => 'admin',
            'email' => 'Admin@gmail.com',
            'password' => Hash::make('password'),
            'image' => 'image.png'
        ]);


                Post::create([
            'title' => 'Judul Pertama',
            'slug' => 'judul-pertama',
            'category_id' => 1,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odit omnis vel, voluptas quae architecto tempore temporibus quis ',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odit omnis vel, voluptas quae architecto tempore temporibus quis 
                        tempora delectus ex tenetur est quaerat? Odit molestiae impedit quaerat 
                        nesciunt eius odio cum ea iusto cupiditate iure, itaque modi illo omnis. 
                        Similique maiores optio, aspernatur alias earum modi totam veniam repellat
                        corrupti corporis excepturi error odio omnis laboriosam expedita dicta hic 
                        nesciunt asperiores laborum reiciendis? Doloribus nisi voluptatibus odit expedita
                        adipisci ad! Quo non fugit ullam rem totam tempora quia culpa natus tenetur officia excepturi,
                        sapiente voluptates reprehenderit necessitatibus deleniti maiores ex accusantium laudantium? Nihil 
                        repellendus obcaecati a nostrum. Nisi, ipsum amet.'
            
        ]);
        Post::create([
            'title' => 'Judul ke Dua',
            'slug' => 'judul-ke-dua',
            'category_id' => 1,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odit omnis vel, voluptas quae architecto tempore temporibus quis ',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odit omnis vel, voluptas quae architecto tempore temporibus quis 
                        tempora delectus ex tenetur est quaerat? Odit molestiae impedit quaerat 
                        nesciunt eius odio cum ea iusto cupiditate iure, itaque modi illo omnis. 
                        Similique maiores optio, aspernatur alias earum modi totam veniam repellat
                        corrupti corporis excepturi error odio omnis laboriosam expedita dicta hic 
                        nesciunt asperiores laborum reiciendis? Doloribus nisi voluptatibus odit expedita
                        adipisci ad! Quo non fugit ullam rem totam tempora quia culpa natus tenetur officia excepturi,
                        sapiente voluptates reprehenderit necessitatibus deleniti maiores ex accusantium laudantium? Nihil 
                        repellendus obcaecati a nostrum. Nisi, ipsum amet.'
            
        ]);
        Post::create([
            'title' => 'Judul ke Tiga',
            'slug' => 'judul-ke-tiga',
            'category_id' => 3,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odit omnis vel, voluptas quae architecto tempore temporibus quis ',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odit omnis vel, voluptas quae architecto tempore temporibus quis 
                        tempora delectus ex tenetur est quaerat? Odit molestiae impedit quaerat 
                        nesciunt eius odio cum ea iusto cupiditate iure, itaque modi illo omnis. 
                        Similique maiores optio, aspernatur alias earum modi totam veniam repellat
                        corrupti corporis excepturi error odio omnis laboriosam expedita dicta hic 
                        nesciunt asperiores laborum reiciendis? Doloribus nisi voluptatibus odit expedita
                        adipisci ad! Quo non fugit ullam rem totam tempora quia culpa natus tenetur officia excepturi,
                        sapiente voluptates reprehenderit necessitatibus deleniti maiores ex accusantium laudantium? Nihil 
                        repellendus obcaecati a nostrum. Nisi, ipsum amet.'
            
        ]);


    }
}
