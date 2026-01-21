<x-layout title="Edit a Role" pageTitle="Edit Role">
    <form method="POST" action="/roles/{{ $role->id }}">
        @csrf
        @method('PATCH')
        <fieldset class="mx-auto fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">

            <label class="label">Name</label>
            <input type="text" name="name" class="input" placeholder="e.g:Admin" value="{{ $role->name }}" />
            @error('name')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror
            <div>
                <fieldset class="fieldset bg-base-100 border-base-300 rounded-box w-20 mt-5 border p-4">
                    <label class="label">
                        <input type="checkbox" id="checkAllBox" class="checkbox checkbox-secondary" />
                        Check All
                    </label>
                    <span id="clearCheckBox" class="flex justify-end text-primary cursor-pointer" hidden>Clear</span>
                </fieldset>
                <div class="divider divider-accent"></div>
                <div class="pb-4"><span class="text-bold text-primary text-xl">Permissions</span></div>
                <div class="flex flex-wrap gap-2">
                    @foreach ($permissions as $permission)
                        <label class="label inline-flex">
                            <input type="checkbox" name="permissions[]"
                                class="permission-item checkbox checkbox-primary" value="{{ $permission }}"
                                {{ $role->permissions->contains('name', $permission) ? 'checked' : '' }} />
                            {{ $permission }}
                        </label>
                    @endforeach
                </div>
            </div>

            <button class="btn btn-neutral mt-4">Update</button>
        </fieldset>
    </form>


    @push('scripts')
        @vite(['resources/js/permissions.js'])
    @endpush


</x-layout>
