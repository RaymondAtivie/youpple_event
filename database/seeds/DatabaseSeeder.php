<?php


use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $this->createExTables(10, false);
        $this->createUsers(10);
        $this->createEvents(25, false);

        $cs = \App\Models\Contestant::all();

        foreach($cs as $c){
            $rid = rand(1,25);
            $A = \App\Models\Award::find($rid);
            $A->contestants()->save($c);
        }
    }

    private function createUsers($num=5, $truncate = true)
    {
        if($truncate){
            User::truncate();
        }
        factory(User::class, $num)->create();
    }

    private function createEvents($num=1, $truncate = true)
    {
        if($truncate){
            \App\Models\Event::truncate();
            \App\Models\Package::truncate();
            \App\Models\Media::truncate();
            \App\Models\Sponsor::truncate();
            \App\Models\Award::truncate();
        }
        factory(\App\Models\Event::class, $num/5)->create();
        factory(\App\Models\Package::class, $num)->create();
        factory(\App\Models\Media::class, $num)->create();
        factory(\App\Models\Sponsor::class, $num)->create();
        factory(\App\Models\Award::class, $num)->create();
    }

    private function createExTables($num=10, $truncate=true)
    {
        if($truncate){
            \App\Models\EventType::truncate();
            \App\Models\PackageFeeType::truncate();
            \App\Models\Contestants::truncate();
        }
        factory(\App\Models\EventType::class, $num)->create();
        factory(\App\Models\PackageFeeType::class, $num)->create();
        factory(\App\Models\Contestant::class, $num*10)->create();
    }
}
