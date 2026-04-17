<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Department;
use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Console\Command;
use App\Models\Worker;
use App\Models\Client;
use App\Models\Review;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание пользователя';

    /**
     * Execute the console command.
     */

    public function handle()
    {
//        $this->prepareData();
//        $this->prepareManyToMany();





        return 0;

    }

    public function prepareData()
    {
        $department1 = Department::create([
            'title' => 'IT',
        ]);
        $department2 = Department::create([
            'title' => 'SEO',
        ]);


        $position1 = Position::create(
            [
                'title' => 'Developer',
                'department_id' => $department1->id,
            ]
        );

        $position2 = Position::create(
            [
                'title' => 'Manager',
                'department_id' => $department1->id,
            ]
        );

        $position3 = Position::create(
            [
                'title' => 'Designer',
                'department_id' => $department1->id,
            ]
        );


        $workerData1 = [
            'name' => 'Иван',
            'surname' => 'Понин',
            'email' => rand(1, 999) . '@treasure.sea',
            'position_id' => $position1->id,
            'age' => rand(18, 60),
            'description' => 'Страння личность',
            'is_married' => rand(0, 1),
        ];

        $workerData2 = [
            'name' => 'Борис',
            'surname' => 'Задунайский',
            'email' => rand(1, 999) . '@treasure.sea',
            'position_id' => $position2->id,
            'age' => rand(18, 23),
            'description' => 'Удивительная личность',
            'is_married' => rand(0, 1),
        ];

        $workerData3 = [
            'name' => 'Катя',
            'surname' => 'Локова',
            'email' => rand(1, 999) . '@treasure.sea',
            'position_id' => $position1->id,
            'age' => rand(18, 23),
            'description' => 'Раздвоенная личность',
            'is_married' => rand(0, 1),
        ];

        $workerData4 = [
            'name' => 'Круз',
            'surname' => 'Долбан',
            'email' => rand(1, 999) . '@treasure.sea',
            'position_id' => $position3->id,
            'age' => rand(18, 33),
            'description' => 'Суб личность',
            'is_married' => rand(0, 1),
        ];

        $workerData5 = [
            'name' => 'Ольга',
            'surname' => 'Астронавт',
            'email' => rand(1, 999) . '@treasure.sea',
            'position_id' => $position3->id,
            'age' => rand(18, 29),
            'description' => 'Социально не сдержанная личность',
            'is_married' => rand(0, 1),
        ];

        $workerData6 = [
            'name' => 'Сэр',
            'surname' => 'Котов',
            'email' => rand(1, 999) . '@treasure.sea',
            'position_id' => $position1->id,
            'age' => rand(48, 64),
            'description' => 'Историческая личность',
            'is_married' => rand(0, 1),
        ];

//        $worker1->


        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);


        $profileData1 = [
            'city' => 'Ростов',
            'skill' => 'Штурман',
            'experience' => 10,
            'finished_study_at' => '2015-06-01',
        ];

        $profileData2 = [
            'city' => 'Камерун',
            'skill' => 'Юнга',
            'experience' => 4,
            'finished_study_at' => '2022-06-01',
        ];

        $profileData3 = [
            'city' => 'Кукарачия',
            'skill' => 'Повар',
            'experience' => 1,
            'finished_study_at' => '2018-06-01',
        ];

        $profileData4 = [
            'city' => 'Антоновка',
            'skill' => 'Мотрос',
            'experience' => 2,
            'finished_study_at' => '2016-06-01',
        ];

        $profileData5 = [
            'city' => 'В. Телелюй',
            'skill' => 'Капитан',
            'experience' => 9,
            'finished_study_at' => '2012-06-01',
        ];

        $profileData6 = [
            'city' => 'Туткормык',
            'skill' => 'Медик',
            'experience' => 1,
            'finished_study_at' => '2025-06-01',
        ];

        $worker1->profile()->create($profileData1);
        $worker2->profile()->create($profileData2);
        $worker3->profile()->create($profileData3);
        $worker4->profile()->create($profileData4);
        $worker5->profile()->create($profileData5);
        $worker6->profile()->create($profileData6);

    }

    public function prepareManyToMany()
    {
        $workerManager = Worker::find(2);
        $workerBackend = Worker::find(1);
        $workerDesigner1 = Worker::find(3);
        $workerDesigner2 = Worker::find(5);
        $workerFrontend1 = Worker::find(4);
        $workerFrontend2 = Worker::find(6);

        $project1 = Project::create([
            'title' => 'Shop'
        ]);
        $project2 = Project::create([
            'title' => 'Blog'
        ]);

        $project1->workers()->attach([
            $workerManager->id,
            $workerBackend->id,
            $workerDesigner1->id,
            $workerFrontend1->id,
        ]);

        $project2->workers()->attach([
            $workerManager->id,
            $workerBackend->id,
            $workerDesigner2->id,
            $workerFrontend2->id,
        ]);

        Client::create([
            'name' => 'Борчик',
        ]);

        Client::create([
            'name' => 'Толик',
        ]);

        Client::create([
            'name' => 'Зинка',
        ]);


    }
}
