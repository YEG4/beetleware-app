<x-layout title="Create a Permission">
    <form method="POST" action="/permissions">
        @csrf

        <fieldset class="mx-auto fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">

            <label class="label">Name</label>
            <input type="text" name="name" class="input" placeholder="e.g:view_post" />
            @error('name')
                <p class="text-error text-xs mt-1">{{ $message }}</p>
            @enderror

            <button class="btn btn-neutral mt-4">Create</button>
        </fieldset>
    </form>

</x-layout>
