<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::get('https://imdb-api.com/API/MostPopularMovies/k_u2bw6ab2', []);
        $items = $response->json()['items'];
        // $chunks = array_chunk($items, 1);
        foreach ($items as $key => $chunk) {
            Movie::create(['body' => $chunk]);
        }
    }
}
