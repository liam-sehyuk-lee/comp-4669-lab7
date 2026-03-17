<?php

namespace App\Services;

use App\Models\Photo;
use Illuminate\Support\Facades\Log;

class PhotoSearchService {

    public function search(string $query): array {
        Log::info('Searching for photos using the "real" PhotoSearchService... this is expensive in terms of time and money.');
        sleep(3);
        return [
            new Photo(['filename' => 'dog.jpg']), 
            new Photo(['filename' => 'cat.jpg'])
        ];
    }

}
