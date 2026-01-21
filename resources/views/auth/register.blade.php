<x-layout>
    <form method="POST" action="/register">
        @csrf

        <fieldset class="mx-auto fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
            <legend class="fieldset-legend">Register</legend>

            <label class="label">Username</label>
            <input type="text" name="name" class="input" placeholder="Username" />
            @error('name')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror

            <label class="label">Email</label>
            <input type="email" class="input" name="email" placeholder="Email" />
            @error('email')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror
            <label class="label">Password</label>
            <input type="password" class="input" name="password" placeholder="Password" />
            @error('password')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror
            <button class="btn btn-neutral mt-4">Register</button>
        </fieldset>
    </form>

</x-layout>
