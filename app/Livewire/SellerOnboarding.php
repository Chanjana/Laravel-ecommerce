<?php

namespace App\Livewire;

use App\Actions\Fortify\PasswordValidationRules;
use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SellerOnboarding extends Component
{
    use PasswordValidationRules;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.seller-onboarding')->layout("layouts.guest");
    }

    public function save()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','confirmed:password_confirmation','min:5','string','max:255'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            "role" => Role::Seller,
        ]);

        $user->markEmailAsVerified();
        \Auth::login($user);

        session()->flash("success", "Seller account created successfully");

        return redirect()->route("filament.admin.pages.dashboard");
    }
}
