<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    // Add a property to track admin login
    public bool $isAdmin = false;

    /**
     * Handle an incoming authentication request.
     * $userType = strtoupper(Auth::user()->type);

        
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        // Handle redirection based on role
        if (Auth::user()->type === 'ADMIN' || $this->isAdmin) {
            redirect()->route('admin.posts');  // Redirect to admin dashboard
        } elseif (Auth::user()->type === 'SUPPORT_IT') {  // Ensure 'type' matches column name casing
            redirect()->route('support');  // Redirect to Support IT dashboard
        } else {
            redirect()->route('index');  // Redirect to home for normal users
        }

    }
};
?>

<!-- HTML Template (Unchanged) -->
<div class="min-h-screen flex bg-gray-100">
    <!-- Left Section: Full-width Login Form -->
    <div class="w-full lg:w-1/2 flex justify-center items-center px-6 lg:px-24 py-12 bg-white">
        <div class="max-w-lg w-full space-y-6">
            <!-- Logo -->
            <a href="/" class="text-yellow-500 text-5xl font-extrabold tracking-wide block text-center mb-6">
            Scooply<span class="text-gray-800">NEWS</span>
            </a>

            <!-- Display success message -->
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Heading -->
            <h2 class="text-3xl font-bold text-gray-900 text-center">Log in to your account</h2>
            <p class="text-sm text-gray-600 text-center">Welcome back! Please enter your details to continue.</p>

            <!-- Login Form -->
            <form wire:submit.prevent="login" class="mt-6 space-y-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input wire:model="form.email" id="email" type="email" required class="mt-1 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Enter your email">
                    
                    <!-- Display Email Error -->
                    @error('form.email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input wire:model="form.password" id="password" type="password" required class="mt-1 block w-full border border-gray-300 rounded-lg py-3 px-4 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Enter your password">
                    
                    <!-- Display Password Error -->
                    @error('form.password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                

                <!-- Forgot Password -->
                <div class="text-right">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-yellow-500 hover:text-yellow-600">Forgot your password?</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-yellow-500 text-black font-bold py-3 rounded-lg hover:bg-yellow-600 transition">
                    Log In
                </button>

                <!-- Sign Up Option -->
                <p class="text-center text-sm mt-4">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-yellow-500 font-semibold hover:text-yellow-600">
                        Sign Up
                    </a>
                </p>
            </form>
        </div>
    </div>

    <!-- Right Section: Cover Image -->
    <div class="hidden lg:flex w-1/2 bg-cover bg-center" style="background-image: url('/path/to/your-image.jpg');">
        <div class="bg-black bg-opacity-50 w-full h-full flex items-center justify-center text-white">
            <div class="text-center max-w-sm">
                <h3 class="text-4xl font-extrabold">Stay Connected</h3>
                <p class="mt-4">Log in to explore the latest personalized news tailored for you.</p>
            </div>
        </div>
    </div>
</div>
