<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        // $this->call(UsersTableSeeder::class);
//        //최상위 댓글
//        $posts->each(function ($post){
//            $post->comments()->save(factory(App\Comment::class)->make());
//            $post->comments()->save(factory(App\Comment::class)->make());
//        });
//        
//        //자식 댓글
//        $posts->each(function ($post) use ($faker){
//            $commentUserNubers = App\Comment::pluck('commentUserNumber')->toArray();
//            
//            foreach(range(1,5) as $index){
//                $post->comments()->save(
//                factory(App\Comment::class)->make([
//                    'parentUserNumber' => $faker->randomElement($commentUserNumbers),
//                    ])
//                );
//            }
//        });
//        
//        $this->command->info('Seeded: comments table');
//    }
}
