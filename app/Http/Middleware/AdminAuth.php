<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('admin_id')) {
            $request->session()->flash('error','Please log in first.');
            return redirect('admin');
            // ->withErrors(['message' => 'Please log in first.']);
            // return redirect()->route('admin')->withErrors(['message' => 'Please log in first.']);
        }


        return $next($request);
    }
}
