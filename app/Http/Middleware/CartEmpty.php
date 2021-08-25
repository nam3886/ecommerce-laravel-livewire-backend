<?php

namespace App\Http\Middleware;

use App\Http\Livewire\Frontend\Options\WithCartSession;
use Closure;
use Illuminate\Http\Request;

class CartEmpty
{
    use WithCartSession;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->cart()->content()->count()) {
            return redirect()->route('cart');
        }
        return $next($request);
    }
}
