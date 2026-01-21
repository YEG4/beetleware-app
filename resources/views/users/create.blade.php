<x-layout title="Create a User">
    <form method="POST" action="/users">
        @csrf

        <fieldset class="mx-auto fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">

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

            <div class="divider divider-accent"></div>
            <div class="pb-4"><span class="text-bold text-primary text-xl">Roles</span></div>
            <div class="flex flex-wrap gap-2">
                @foreach ($roles as $role)
                    <label class="label inline-flex">
                        <input type="checkbox" name="roles[]" class="permission-item checkbox checkbox-primary"
                            value="{{ $role }}" />
                        {{ $role }}
                    </label>
                @endforeach
            </div>


            <button class="btn btn-neutral mt-4">Create</button>
        </fieldset>
    </form>

</x-layout>
