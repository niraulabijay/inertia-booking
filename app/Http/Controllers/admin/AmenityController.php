<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\Amenity;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class AmenityController extends Controller
{
    public function index(){
        Inertia::render('Amenity/Index',[
            'filters' => Request::all('search', 'trashed'),
            'amenities' => Amenity::orderBy('name')
//                ->filter(Request::only('search', 'trashed'))
                ->paginate()
                ->only('id', 'name', 'status', 'image'),
        ]);
    }
}
