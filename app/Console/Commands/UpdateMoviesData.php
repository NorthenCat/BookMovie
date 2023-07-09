<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Movies;

class UpdateMoviesData extends Command
{
    protected $signature = 'movies:update';
    protected $description = 'Update movies data from the API';

    public function handle()
    {
        $api_url = 'https://seleksi-sea-2023.vercel.app/api/movies';
        $response = Http::get($api_url);
        $movies = $response->json();

        foreach ($movies as $movie) {
            Movies::updateOrCreate([
                'title' => $movie['title'],
                'description' => $movie['description'],
                'release_date' => $movie['release_date'],
                'poster_url' => $movie['poster_url'],
                'age_rating' => $movie['age_rating'],
                'ticket_price' => $movie['ticket_price'],
            ]);
        }

        $this->info('Movies data updated successfully.');
    }
}