<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'         => 'Super Admin',
                'email'        => 'admin@mugijaya.com',
                'password'     => Hash::make('password'),
                'role'         => 'admin',
                'phone'        => '08111000001',
                'is_active'    => true,
                'warehouse_id' => null,
            ],
            [
                'name'         => 'Pak Sukma',
                'email'        => 'owner@mugijaya.com',
                'password'     => Hash::make('password'),
                'role'         => 'owner',
                'phone'        => '08111000002',
                'is_active'    => true,
                'warehouse_id' => null,
            ],
            [
                'name'         => 'Pak Egi',
                'email'        => 'engineering@mugijaya.com',
                'password'     => Hash::make('password'),
                'role'         => 'engineering',
                'phone'        => '08111000003',
                'is_active'    => true,
                'warehouse_id' => null,
            ],
            [
                'name'         => 'Pak Yudi',
                'email'        => 'kepalawh@mugijaya.com',
                'password'     => Hash::make('password'),
                'role'         => 'kepala_wh',
                'phone'        => '08111000004',
                'is_active'    => true,
                'warehouse_id' => '3',
            ],
            [
                'name'         => 'Budi Santoso',
                'email'        => 'sopir@mugijaya.com',
                'password'     => Hash::make('password'),
                'role'         => 'sopir',
                'phone'        => '08111000005',
                'is_active'    => true,
                'warehouse_id' => null,
            ],
            [
                'name'         => 'Pak Darto',
                'email'        => 'mandor@mugijaya.com',
                'password'     => Hash::make('password'),
                'role'         => 'mandor',
                'phone'        => '08111000006',
                'is_active'    => true,
                'warehouse_id' => null,
            ],
            [
                'name'         => 'Ahmad Tukang',
                'email'        => 'tukang@mugijaya.com',
                'password'     => Hash::make('password'),
                'role'         => 'tukang',
                'phone'        => '08111000007',
                'is_active'    => true,
                'warehouse_id' => '3',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }

        $this->command->info('✅ Users seeded berhasil!');
        $this->command->table(
            ['Nama', 'Email', 'Role', 'Password'],
            array_map(fn($u) => [$u['name'], $u['email'], $u['role'], 'password'], $users)
        );
    }
}