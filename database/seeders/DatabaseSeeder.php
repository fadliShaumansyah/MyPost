<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\kategori;
use App\Models\post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    user::create([
        'name'=>'Fadli Shaumansyah',
        'username'=>'gieenenz',
        'email'=>'fadlishaumansyah@gmail.com',
        'password'=> bcrypt('password')
    ]);
    // user::create([
    //     'name'=>'Faisal mugni',
    //     'email'=>'faisalmugni@gmail.com',
    //     'password'=> bcrypt('12345')
    // ]);

    User::factory(3)->create();

    kategori::create([
        'nama'=>'Web Programing',
        'slug'=>'web-programing'
    ]);

    kategori::create([
        'nama'=>'web design',
        'slug'=>'web-design'
    ]);
    kategori::create([
        'nama'=>'Personal',
        'slug'=>'personal'
    ]);

    post::Factory(20)->create();

    // post::create([
    //     'kategori_id'=>1,
    //     'user_id'=>1,
    //     'title'=>'judul pertama',
    //     'slug'=>'judul-pertama',
    //     'excerpt'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur facere, iste ipsum hic ratione expedita similique fuga, repellat autem in, ',
    //     'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur facere, iste ipsum hic ratione expedita similique fuga, repellat autem in, ex maxime iure quasi nam qui? Nemo, cupiditate illum autem eum soluta odit enim hic doloribus ab officiis minus aut, voluptate ratione dolore. Quisquam quas culpa facilis accusamus doloremque, perferendis ratione sapiente aperiam natus, earum excepturi laboriosam consectetur dignissimos laudantium dolore! Possimus voluptates libero cupiditate voluptas, ducimus quod ullam aliquam provident velit id nam ab reprehenderit porro accusamus quae temporibus odio itaque placeat et vitae dolor distinctio consectetur iste dolorem. Inventore, quod esse est nesciunt non pariatur. Modi, pariatur atque.'
    // ]);
    // post::create([
    //     'kategori_id'=>1,
    //     'user_id'=>2,
    //     'title'=>'judul kedua',
    //     'slug'=>'judul-kedua',
    //     'excerpt'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur facere, iste ipsum hic ratione expedita similique fuga, repellat autem in, ',
    //     'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur facere, iste ipsum hic ratione expedita similique fuga, repellat autem in, ex maxime iure quasi nam qui? Nemo, cupiditate illum autem eum soluta odit enim hic doloribus ab officiis minus aut, voluptate ratione dolore. Quisquam quas culpa facilis accusamus doloremque, perferendis ratione sapiente aperiam natus, earum excepturi laboriosam consectetur dignissimos laudantium dolore! Possimus voluptates libero cupiditate voluptas, ducimus quod ullam aliquam provident velit id nam ab reprehenderit porro accusamus quae temporibus odio itaque placeat et vitae dolor distinctio consectetur iste dolorem. Inventore, quod esse est nesciunt non pariatur. Modi, pariatur atque.'
    // ]);
    // post::create([
    //     'kategori_id'=>2,
    //     'user_id'=>2,
    //     'title'=>'judul ketiga',
    //     'slug'=>'judul-ketiga',
    //     'excerpt'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur facere, iste ipsum hic ratione expedita similique fuga, repellat autem in, ',
    //     'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur facere, iste ipsum hic ratione expedita similique fuga, repellat autem in, ex maxime iure quasi nam qui? Nemo, cupiditate illum autem eum soluta odit enim hic doloribus ab officiis minus aut, voluptate ratione dolore. Quisquam quas culpa facilis accusamus doloremque, perferendis ratione sapiente aperiam natus, earum excepturi laboriosam consectetur dignissimos laudantium dolore! Possimus voluptates libero cupiditate voluptas, ducimus quod ullam aliquam provident velit id nam ab reprehenderit porro accusamus quae temporibus odio itaque placeat et vitae dolor distinctio consectetur iste dolorem. Inventore, quod esse est nesciunt non pariatur. Modi, pariatur atque.'
    // ]);
    // post::create([
    //     'kategori_id'=>2,
    //     'user_id'=>1,
    //     'title'=>'judul keempat',
    //     'slug'=>'judul-keempat',
    //     'excerpt'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur facere, iste ipsum hic ratione expedita similique fuga, repellat autem in, ',
    //     'body'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur facere, iste ipsum hic ratione expedita similique fuga, repellat autem in, ex maxime iure quasi nam qui? Nemo, cupiditate illum autem eum soluta odit enim hic doloribus ab officiis minus aut, voluptate ratione dolore. Quisquam quas culpa facilis accusamus doloremque, perferendis ratione sapiente aperiam natus, earum excepturi laboriosam consectetur dignissimos laudantium dolore! Possimus voluptates libero cupiditate voluptas, ducimus quod ullam aliquam provident velit id nam ab reprehenderit porro accusamus quae temporibus odio itaque placeat et vitae dolor distinctio consectetur iste dolorem. Inventore, quod esse est nesciunt non pariatur. Modi, pariatur atque.'
    // ]);
     }
}
