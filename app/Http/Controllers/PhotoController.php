<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PhotoSearchService;
use Illuminate\Http\Request;

class PhotoController extends Controller {

    /**
     * In this function, the PhotoSearchService dependency is hard-coded. This is not ideal.
     * If the search function makes a network request, hits and API, etc. our tests will be 
     * slow and expensive. Not ideal.
     */
    public function index2(Request $request) {
        $photoSearchService = new PhotoSearchService(); // hard-coded - not ideal
        $results = $photoSearchService->search($request->string('query'));
        return response()->json($results);
    }

    /**
     * Here we have moved the PhotoSearchService to be injected into the function as a parameter
     * (using https://laravel.com/docs/12.x/container#zero-configuration-resolution)
     * then we can mock it at the runtime of the tests. Good.
     */
    public function index(Request $request, PhotoSearchService $photoSearchService) {
        $results = $photoSearchService->search($request->string('query'));
        return response()->json($results);
    }

    /**
     * In this example we get an instance of the PhotoSearchService via the DI container.
     * This can be mocked at test runtime as well. Good.
     */
    public function index3(Request $request) {
        $photoSearchService = app(PhotoSearchService::class);
        $results = $photoSearchService->search($request->string('query'));
        return response()->json($results);
    }

}
