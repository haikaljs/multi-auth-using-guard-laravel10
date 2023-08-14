<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;



class Admin extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(! $request->expectsJson()){
            return route('admin-login');
        }
    }

 
  


     
  
}
