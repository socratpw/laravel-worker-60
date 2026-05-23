<?php

namespace App\Console\Commands;
use App\Http\Filters\Var1\WorkerFilter;
use App\Http\Filters\Var2\Worker\AgeTo;
use App\Http\Filters\Var2\Worker\Name;
use App\Models\Client;
use App\Http\Filters\Var2\Age;
use App\Http\Filters\Var2\Worker\AgeFrom;

use App\Models\Avatar;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Worker;
use Illuminate\Console\Command;
use Illuminate\Pipeline\Pipeline;
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
