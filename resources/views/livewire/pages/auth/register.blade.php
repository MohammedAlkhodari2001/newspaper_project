<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(User::create($validated)));

        // Redirect to login page with a success message
        Session::flash('status', 'Account created successfully! Please log in.');
        $this->redirect(route('login'), navigate: true);
    }
};
?>
<div class="min-h-screen flex bg-gray-100">
    <!-- Left Section: Full-width Registration Form -->
    <div class="w-full lg:w-1/2 flex justify-center items-center px-6 lg:px-24 py-12 bg-white">
        <div class="max-w-lg w-full space-y-6">
            <!-- Logo -->
            <a href="/" class="text-yellow-500 text-5xl font-extrabold tracking-wide block text-center mb-6">
                BIZ<span class="text-gray-800">NEWS</span>
            </a>

            <!-- Heading -->
            <h2 class="text-3xl font-bold text-gray-900 text-center">Sign Up</h2>
            <p class="text-sm text-gray-600 text-center">Join BizNews to get personalized news updates.</p>

            <!-- Form -->
            <form wire:submit="register" class="mt-6 space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input wire:model="name" id="name" type="text" required class="mt-1 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Enter your name">
                    @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input wire:model="email" id="email" type="email" required class="mt-1 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Enter your email">
                    @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input wire:model="password" id="password" type="password" required class="mt-1 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Enter your password">
                    <p class="text-xs text-gray-500 mt-1">Use at least 8 characters with one uppercase letter and a symbol.</p>
                    @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input wire:model="password_confirmation" id="password_confirmation" type="password" required class="mt-1 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Confirm your password">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-yellow-500 text-black font-bold py-3 rounded-lg hover:bg-yellow-600 transition">
                    Sign Up
                </button>

                <!-- Already Registered -->
                <p class="text-center text-sm mt-4">
                    Already a member?
                    <a href="{{ route('login') }}" class="text-yellow-500 font-semibold hover:text-yellow-600">
                        Sign In
                    </a>
                </p>
            </form>
        </div>
    </div>

    <!-- Right Section: Cover Image -->
    <div class="hidden lg:flex w-1/2 bg-cover bg-center" style="background-image: url('/path/to/your-image.jpg');">
        <div class="bg-black bg-opacity-50 w-full h-full flex items-center justify-center text-white">
            <div class="text-center max-w-sm">
                <h3 class="text-4xl font-extrabold">Stay Updated</h3>
                <p class="mt-4">Join our community and never miss important news updates.</p>
            </div>
        </div>
    </div>
</div>



