<x-layout title="Edit a User">
    <form method="POST" action="/users/{{ $user->id }}">
        @csrf
        @method('PATCH')
        <fieldset class="mx-auto fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">

            <label class="label">Username</label>
            <input type="text" name="name" class="input" placeholder="Username" value="{{ $user->name }}" />
            @error('name')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror

            <label class="label">Email</label>
            <input type="email" class="input" name="email" placeholder="Email" value="{{ $user->email }}" />
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
                            value="{{ $role }}" {{ $user->roles->contains('name', $role) ? 'checked' : '' }} />
                        {{ $role }}
                    </label>
                @endforeach
            </div>

            <button class="btn btn-neutral mt-4">Update</button>
        </fieldset>
    </form>

</x-layout>
