<?php

namespace Database\Seeders;

use App\Models\Signature;
use Illuminate\Database\Seeder;

class SignatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Signature::create([
            'name'=>'Nome Sobrenome',

            'position'=>'Analista',

            'department'=>'Coordenação Geral',

            'phone'=>'(61)99999-9999',

            'email'=>'nome@empresa.gov.br',

            'path'=>'uploads/modelo.png',

            'created_by'=>1
        ]);
    }
}
