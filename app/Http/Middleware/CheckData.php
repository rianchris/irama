<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Budata;
use Illuminate\Http\Request;

class CheckData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest()) {
            return abort(403);
        } else if (auth()->user()->myprofile->role == 'warga' || auth()->user()->myprofile->role == 'mitra') {
            $data = Budata::where('bu_id', auth()->user()->myprofile->buMitra->id)->count();
            if ($data != 12) {
                return redirect(route('dashboard.index'))->with('checkdata', 'Silahkan lengkapi data terlebih dahulu sebelum melakukan Self Assessment');
            }
        }
        return $next($request);
    }
}
