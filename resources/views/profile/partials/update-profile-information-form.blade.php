<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's username, full name, and email address.") }}
        </p>
    </header>

    <form
        method="post"
        action="{{ route('profile.update') }}"
        class="mt-6 space-y-6"
    >
        @csrf
        @method('patch')

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />

            <x-text-input
                id="username"
                name="username"
                type="text"
                class="mt-1 block w-full"
                :value="old('username', $user->username)"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('username')"
            />
        </div>

        <!-- Full Name -->
        <div>
            <x-input-label for="full_name" :value="__('Full Name')" />

            <x-text-input
                id="full_name"
                name="full_name"
                type="text"
                class="mt-1 block w-full"
                :value="old('full_name', $user->full_name)"
                required
                autocomplete="name"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('full_name')"
            />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                :value="old('email', $user->email)"
                required
                autocomplete="email"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <p class="mt-2 text-sm text-gray-800">
                    {{ __('Your email address is unverified.') }}
                </p>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>