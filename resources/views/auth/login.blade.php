<x-layout title="Login - Beetleware">
    <form method="POST" action="/login">
        @csrf

        <fieldset class="mx-auto fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">Login</legend>

            <label class="label">Email</label>
            <input type="email" class="input" name="email" placeholder="Email" />
            <label class="label">Password</label>
            <input type="password" class="input" name="password" placeholder="Password" />

            @error('email')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror
            <button class="btn btn-neutral mt-4">Login</button>
        </fieldset>
    </form>

</x-layout>
