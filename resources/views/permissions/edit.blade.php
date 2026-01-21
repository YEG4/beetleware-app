<x-layout title="Edit a Permission" pageTitle="Edit Permission">
    <form method="POST" action="/permissions/{{ $permission->id }}">
        @csrf
        @method('PATCH')
        <fieldset class="mx-auto fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">

            <label class="label">Name</label>
            <input type="text" name="name" class="input" placeholder="e.g:Admin" value="{{ $permission->name }}" />
            @error('name')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror

            <button class="btn btn-neutral mt-4">Update</button>
        </fieldset>
    </form>

</x-layout>
