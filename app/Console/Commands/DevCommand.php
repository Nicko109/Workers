<?php

namespace App\Console\Commands;

use App\Http\Filter\WorkerFilter;
use App\Jobs\SomeJob;
use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Worker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Facade;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Some develops';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        return 0;

    }

    public function prepareData()
    {

        Client::create([
            'name' => 'Bob'
        ]);

        Client::create([
            'name' => 'Victor'
        ]);

        Client::create([
            'name' => 'Elena'
        ]);


        $department1 = Department::create([
            'title' => 'IT'
        ]);

        $department2 = Department::create([
            'title' => 'Analytics'
        ]);


        $position1 = Position::create([
            'title' => 'Developer',
            'department_id' => $department1->id
        ]);

        $position2 = Position::create([
            'title' => 'Manager',
            'department_id' => $department1->id
        ]);
        $position3 = Position::create([
            'title' => 'Designer',
            'department_id' => $department1->id
        ]);


        $workerData1 = [
            'name' => 'Ivan',
            'surname' => 'Ivanov',
            'email' => 'Ivan@mail.ru',
            'position_id' => $position1->id,
            'age' => 20,
            'description' => 'About',
            'is_married' => false,
        ];
        $workerData2 = [
            'name' => 'Karl',
            'surname' => 'Karlov',
            'email' => 'Karl@mail.ru',
            'position_id' => $position2->id,
            'age' => 28,
            'description' => 'About',
            'is_married' => true,
        ];
        $workerData3 = [
            'name' => 'Kate',
            'surname' => 'Ivanova',
            'email' => 'Ivanova@mail.ru',
            'position_id' => $position1->id,
            'age' => 20,
            'description' => 'About',
            'is_married' => false,
        ];
        $workerData4 = [
            'name' => 'Kot',
            'surname' => 'Kotov',
            'email' => 'Kot@mail.ru',
            'position_id' => $position1->id,
            'age' => 30,
            'description' => 'About',
            'is_married' => false,
        ];
        $workerData5 = [
            'name' => 'Roma',
            'surname' => 'Romanov',
            'email' => 'Roma@mail.ru',
            'position_id' => $position3->id,
            'age' => 23,
            'description' => 'About',
            'is_married' => true,
        ];
        $workerData6 = [
            'name' => 'Alex',
            'surname' => 'Alexov',
            'email' => 'Alex@mail.ru',
            'position_id' => $position1->id,
            'age' => 22,
            'description' => 'About',
            'is_married' => false,
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);


        $profileData1 = [
            'city' => 'Tokyo',
            'skill' => 'Coder',
            'experience' => 5,
            'finished_study_at' => '2020-06-06',
        ];

        $profileData2 = [
            'city' => 'Berlin',
            'skill' => 'Boss',
            'experience' => 10,
            'finished_study_at' => '2014-06-06',
        ];

        $profileData3 = [
            'city' => 'Oslo',
            'skill' => 'Developer',
            'experience' => 1,
            'finished_study_at' => '2021-06-06',
        ];
        $profileData4 = [
            'city' => 'Moscow',
            'skill' => 'Coder',
            'experience' => 3,
            'finished_study_at' => '2018-06-06',
        ];
        $profileData5 = [
            'city' => 'Rome',
            'skill' => 'Digital',
            'experience' => 12,
            'finished_study_at' => '2023-06-06',
        ];
        $profileData6 = [
            'city' => 'Leuca',
            'skill' => 'Dev',
            'experience' => 4,
            'finished_study_at' => '2022-06-06',
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

    }

}
