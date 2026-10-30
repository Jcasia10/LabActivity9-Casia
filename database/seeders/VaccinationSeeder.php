<?php

namespace Database\Seeders;

use App\Models\Vaccination;
use Illuminate\Database\Seeder;

class VaccinationSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['patient_name' => 'Mikaela Salazar', 'purok' => 'Purok 2', 'vaccine' => 'BCG', 'dose' => '1st dose', 'scheduled_at' => '2026-11-03', 'status' => 'Scheduled'],
            ['patient_name' => 'Noel Gamboa', 'purok' => 'Purok 5', 'vaccine' => 'Pentavalent', 'dose' => '2nd dose', 'scheduled_at' => '2026-11-05', 'status' => 'Scheduled'],
            ['patient_name' => 'Aira Monteverde', 'purok' => 'Purok 1', 'vaccine' => 'OPV', 'dose' => 'Booster', 'scheduled_at' => '2026-10-30', 'status' => 'Done'],
            ['patient_name' => 'Lorenzo Dizon', 'purok' => 'Purok 4', 'vaccine' => 'MMR', 'dose' => '1st dose', 'scheduled_at' => '2026-10-31', 'status' => 'Overdue'],
            ['patient_name' => 'Tess Villanueva', 'purok' => 'Purok 3', 'vaccine' => 'Anti-Flu', 'dose' => 'Annual', 'scheduled_at' => '2026-11-08', 'status' => 'Scheduled'],
            ['patient_name' => 'Jomar Andrada', 'purok' => 'Purok 6', 'vaccine' => 'Hepatitis B', 'dose' => '3rd dose', 'scheduled_at' => '2026-02-14', 'status' => 'Done'],
            ['patient_name' => 'Julianne Marie Casia', 'purok' => 'Purok 2', 'vaccine' => 'BCG', 'dose' => '3rd dose', 'scheduled_at' => '2026-10-13', 'status' => 'Done'],
        ];

        foreach ($rows as $row) {
            Vaccination::create($row);
        }
    }
}
