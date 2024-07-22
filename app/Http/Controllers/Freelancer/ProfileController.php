<?php

namespace App\Http\Controllers\Freelancer;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Freelancer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function edit(): View
    {
        $user = Auth::user();
        $profile = $user->freelancer->first_name;

        return view('freelancer.profiles.edit', compact('user','profile'));
        
    }

    public function update(Request $request,): RedirectResponse
    {
        $request->validate(['first_name'=>'required']);
        
        
        $user= Auth::user();

        // dd($user->id, $user->freelancer, $request->all());
        $user->freelancer()->updateOrCreate(['user_id'=> $user->id],$request->all());
        
    return redirect(route('freelance.profile.edit'))->with('success', 'profile updated');
    }
}
