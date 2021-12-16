<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\{
    Component,
    Type,
    Place,
    Sector,
    User,
    Patrimony
};

class PatrimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $computer = Component::create(['name' => 'Computador']);
        $notebook = Component::create(['name' => 'Notebook']);
        $router = Component::create(['name' => 'Roteador']);
        $projector = Component::create(['name' => 'Projetor']);
        $board = Component::create(['name' => 'Lousa Digital']);

        $typeOnePc = Type::create(['name' => 'Tipo 1 PC', 'component_id' => $computer->id]);
        $positive = Type::create(['name' => 'Positivo', 'component_id' => $notebook->id]);
        $ap = Type::create(['name' => 'AP360', 'component_id' => $router->id]);
        $benq = Type::create(['name' => 'Benq MS525', 'component_id' => $projector->id]);
        $digiSonic = Type::create(['name' => 'DigiSonic', 'component_id' => $board->id]);

        $place = Place::create(['name' => 'Instituto Federal']);

        $lab = Sector::create(['name' => 'LAB']);
        $library = Sector::create(['name' => 'Biblioteca']);
        $corridor = Sector::create(['name' => 'Corredor']);
        $classroom = Sector::create(['name' => 'Sala de Aula']);
        $auditorium = Sector::create(['name' => 'Auditório']);

        $user = User::first();

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $computer->id,
            'type_id' => $typeOnePc->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $lab->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $computer->id,
            'type_id' => $typeOnePc->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $lab->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $notebook->id,
            'type_id' => $positive->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $library->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $notebook->id,
            'type_id' => $positive->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $library->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $router->id,
            'type_id' => $ap->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $corridor->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $router->id,
            'type_id' => $ap->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $lab->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);
        
        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $projector->id,
            'type_id' => $benq->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $classroom->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $projector->id,
            'type_id' => $benq->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $classroom->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $board->id,
            'type_id' => $digiSonic->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $classroom->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);

        Patrimony::create([
            'number' => $faker->unique()->numberBetween(10000, 99999),
            'component_id' => $board->id,
            'type_id' => $digiSonic->id,
            'ip' => $faker->unique()->localIpv4(),
            'place_id' => $place->id,
            'sector_id' => $auditorium->id,
            'user_id' => $user->id,
            'note' => rand(0, 100) % 2 === 0 ? $faker->sentence : null
        ]);
    }
}
