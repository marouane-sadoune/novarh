<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasCompanyContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('company_id')) {
            return $next($request);
        }
        // Redirect to a route or view if the company context is not set
        session()->flash('error', 'Please select Company first.');
        return redirect()->route('companies.index');
        // Alternatively, you could return a 403 response or redirect to a different page
        // return response()->view('errors.403', [], 403);
        // return redirect()->route('home');
        // return response()->json(['error' => 'Company context is not set'], 403
        // );
    }
}
