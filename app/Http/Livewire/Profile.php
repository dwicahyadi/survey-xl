<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Cluster;
use App\Models\Dealer;
use App\Models\OutletType;
use App\Models\Province;
use Auth;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Profile extends Component
{
    public $provinces, $cities = [];
    public $user;
    public $name, $email, $province, $city, $old_password, $new_password, $new_password_confirmation;



    public function mount()
    {
        $this->provinces = Province::orderBy('name')->get();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->province = $this->user->province;
        $this->city = $this->user->city;

        if ($this->user->province)
            $this->updatedProvince($this->user->province);

    }
    public function render()
    {
        return view('livewire.profile');
    }

    public function updatedProvince($value)
    {
        $selected = (object) json_decode($value);
        $this->cities = City::where('province_id', $selected->id)->orderBy('name')->get();
    }

    public function update_contact()
    {
        $this->validate([
            'name' => 'required',
        ]);
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->update();
        session()->flash('message', 'Contact Updated');

        return $this->redirect(route('profile'));
    }

    public function update_region()
    {
        $this->validate([
            'province' => 'required',
            'city' => 'required',
        ]);
        $this->user->province = $this->province;
        $this->user->city = $this->city;
        $this->user->update();
        session()->flash('message', 'Region Updated');
        return $this->redirect(route('profile'));
    }

    public function update_password()
    {
        $this->validate([
            'old_password' => 'required|min:8',
            'new_password' => 'required|confirmed|min:8',
        ]);
        if(Hash::check($this->old_password, Auth::user()->getAuthPassword()))
        {
            $this->user->password = Hash::make($this->new_password);
            $this->user->update();
            session()->flash('message', 'Password updated');
            return $this->redirect(route('profile'));
        }

        return Redirect::to(route('profile'))->withErrors(['Failed to update password. Wrong Old Password!']);



    }
}
