<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ville;

class villeTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ville::create([
            "nom_ville" => "Casablanca"
        ]);
        Ville::create([
            "nom_ville" => "Fez[c]"
        ]);
        Ville::create([
            "nom_ville" => "Rabat[d]"
        ]);
        Ville::create([
            "nom_ville" => "Tangier[e]"
        ]);
        Ville::create([
            "nom_ville" => "Marrakesh[f]"
        ]);
        Ville::create([
            "nom_ville" => "Agadir"
        ]);
        Ville::create([
            "nom_ville" => "Salé[g]"
        ]);
        Ville::create([
            "nom_ville" => "Oujda"
        ]);
        Ville::create([
            "nom_ville" => "Khouribga"
        ]);
        Ville::create([
            "nom_ville" => "Meknes[h]"
        ]);
        Ville::create([
            "nom_ville" => "Kenitra"
        ]);
        Ville::create([
            "nom_ville" => "Tetouan"
        ]);
        Ville::create([
            "nom_ville" => "Safi"
        ]);
        Ville::create([
            "nom_ville" => "Temara"
        ]);
        Ville::create([
            "nom_ville" => "Mohammedia"
        ]);
        Ville::create([
            "nom_ville" => "El Jadida"
        ]);
        Ville::create([
            "nom_ville" => "Beni Mellal"
        ]);
        Ville::create([
            "nom_ville" => "Aït Melloul"
        ]);
        Ville::create([
            "nom_ville" => "Nador"
        ]);
        Ville::create([
            "nom_ville" => "Dar Bouazza"
        ]);
        Ville::create([
            "nom_ville" => "Taza"
        ]);
        Ville::create([
            "nom_ville" => "Settat"
        ]);
        Ville::create([
            "nom_ville" => "Berrechid"
        ]);
        Ville::create([
            "nom_ville" => "Khemisset"
        ]);
        Ville::create([
            "nom_ville" => "Inezgane"
        ]);
        Ville::create([
            "nom_ville" => "Ksar El Kebir"
        ]);
        Ville::create([
            "nom_ville" => "Larache"
        ]);
        Ville::create([
            "nom_ville" => "Guelmim"
        ]);
        Ville::create([
            "nom_ville" => "Khenifra"
        ]);
        Ville::create([
            "nom_ville" => "Berkane"
        ]);
        Ville::create([
            "nom_ville" => "Taourirt"
        ]);
        Ville::create([
            "nom_ville" => "Bouskoura"
        ]);
        Ville::create([
            "nom_ville" => "Fquih Ben Salah"
        ]);
        Ville::create([
            "nom_ville" => "Dcheira El Jihadia"
        ]);
    }
}
