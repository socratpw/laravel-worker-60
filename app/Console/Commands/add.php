<?php

namespace App\Console\Commands;
use App\Models\Client;

use App\Models\Avatar;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Worker;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class add extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

//        $this->start();



        $position = Position::find(4);

        dd($position->old->toArray());


//        $tag = Tag::find(1);
////
//        dd($tag->clients->toArray());
////








    }


    public function start()
    {



        $worker = Worker::find(7);
        $client = Client::find(3);


//        Создание тегов
        Tag::create([
           'tag' => 'Футбол',
        ]);
        Tag::create([
            'tag' => 'тенис',
        ]);
        Tag::create([
            'tag' => 'Кино',
        ]);
        Tag::create([
            'tag' => 'Озеро',
        ]);


//      Привязать теги
        $worker->tags()->attach([1, 3]);
        $client->tags()->attach([1, 2]);



//        Создание отзывов
        $worker->reviews()->create([
            'description' => fake('ru_RU')->realText(150),
        ]);
        $client->reviews()->create([
            'description' => fake('ru_RU')->realText(150),
        ]);


//        Создение аватарок
        $worker->avatar()->create(['url' => fake()->url() ]);
        $client->avatar()->create(['url' => fake()->url() ]);











    }




}
