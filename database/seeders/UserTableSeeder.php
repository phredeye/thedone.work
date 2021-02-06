<?php

namespace Database\Seeders;

use App\Contracts\SeedsFakeData;
use App\Models\Membership;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder implements SeedsFakeData
{

    public function run($generate_fake_data) {
        if($generate_fake_data) {
            $this->generateFakeData();
        }
    }

    public function getRandomUsersNotInTeam(int $teamId, int $count = 5) : Collection {
        $userIds = DB::table('team_user')
            ->select('user_id')
            ->where('team_id', '<>', $teamId)
            ->inRandomOrder()
            ->limit($count)
            ->get()
            ->map(function($row){
                return $row->user_id;
            })->toArray();

        return User::where('id', $userIds)->get();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function generateFakeData() : void
    {

        $this->command->getOutput()->writeln('Creating 20 initial users');

        User::factory(20)->create();

        $this->command->getOutput()->writeln('Creating 5 teams');

        /** @var Team $teams */
        $teams = Team::factory(5)->create();

        $progress = $this->command->getOutput()->createProgressBar(5);

        /** @var Team $team */
        foreach($teams as $team) {
            $progress->advance(1);
            $team->users()->saveMany($this->getRandomUsersNotInTeam($team->id, rand(1,5)));
        }

        $progress->finish();
    }
}
