<?php

namespace App\Console\Commands;
use App\Http\Filters\Var1\WorkerFilter;
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
use App\Jobs\SendMailJob;

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


        $bill = Worker::query(); // Создал билдер

        $filter = new WorkerFilter(['age' => 22, 'to' => 33]);  // Это параметры фильтра

        $filter->applyFilter($bill); // Создаю фильтр и закидываю туда Билдер

        dd($bill->get()->toArray()); // Это по идее не фильтр а что?







        return 0;


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
