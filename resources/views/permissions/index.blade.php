<x-layout title="Permissions" pageTitle="Permissions">
    @can('create_permissions')
        <div class="flex justify-end p-4"><a href="/permissions/create" class="btn btn-primary">Create a Permissions</a></div>
    @endcan

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($permissions as $permission)
                    <tr>
                        <th>{{ $permission->id }}</th>
                        <td>{{ $permission->name }}</td>
                        <td class="flex gap-2">
                            @can('edit_permissions')
                                <a class="btn btn-secondary" href="/permissions/{{ $permission->id }}/edit">Edit</a>
                            @endcan
                            @can('delete_permissions')
                                <form action="/permissions/{{ $permission->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-warning">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $permissions->links() }}
    </div>
</x-layout>
