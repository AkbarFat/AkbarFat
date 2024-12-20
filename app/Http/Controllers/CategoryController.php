<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   use HasFactory;

   public function getRouteKeyName(): string
   {
        return 'slug';
   }
}
