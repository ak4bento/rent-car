<?php

namespace Database\Seeders;

use App\Models\InformasiUser;
use App\Models\User;
use App\Repositories\InformasiUserRepository;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    private $informasiUserRepository;

    public function __construct(InformasiUserRepository $informasiUserRepo)
    {
        $this->informasiUserRepository = $informasiUserRepo;
    }
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'tenant']);

        $user = \App\Models\User::factory()->create([
            'name' => 'administrator',
            'email' => 'administrator@akil.co.id',
            'password' => bcrypt('Ve5JbvSCBXBkdni'),
        ]);

        $user->assignRole('admin');

        $users = \App\Models\User::factory(10)->create();
        foreach ($users as $user) {
            $input = [
                'user_id' => $user->id,
                'address' => fake()->address(),
                'telephone' => fake()->phoneNumber(),
                'SIM' => fake()->numberBetween(1000, 9999).fake()->numberBetween(1000, 9999).fake()->numberBetween(1000, 9999).fake()->numberBetween(1000, 9999),
            ];

            $informasiUser = $this->informasiUserRepository->create($input);
            $user->assignRole('tenant');
        }
    }
}
