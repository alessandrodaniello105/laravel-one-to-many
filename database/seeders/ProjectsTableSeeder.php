<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Technology;
use App\Models\Type;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 14; $i++) {
            $new_project = new Project();
            //utilizzo il faker per vedere se funziona il seeder
            $new_project->technology_id = Technology::inRandomOrder()->first()->id;
            $new_project->type_id = Type::inRandomOrder()->first()->id;
            $new_project->title = $faker->text(75);
            $new_project->slug = Str::slug($new_project->title, '-');
            $new_project->description = $faker->paragraph(2);
            $new_project->save();
        }
    }
}
