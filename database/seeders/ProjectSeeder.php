<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = new Project();
        $project->name = 'Intranet UTA';
        $project->category = 'Academico';
        $project->cost = 15000000;
        $project->status = 'Pendiente';
        $project->po_id = 1;

        $project->save();

        $project2 = new Project();
        $project2->name = 'LicoDev Web Software 2.0';
        $project2->category = 'Academico';
        $project2->cost = 33000000;
        $project2->status = 'Pendiente';
        $project2->po_id = 2;

        $project2->save();

        Project::factory(20)->create();
    }
}
