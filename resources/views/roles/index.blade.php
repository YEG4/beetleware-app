<x-layout title="Roles" pageTitle="Roles">
    @can('create_roles')
        <div class="flex justify-end p-4"><a href="/roles/create" class="btn btn-primary">Create a Role</a></div>
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
                @foreach ($roles as $role)
                    <tr>
                        <th>{{ $role->id }}</th>
                        <td>{{ $role->name }}</td>
                        <td class="flex gap-2">
                            @can('edit_roles')
                                <a class="btn btn-secondary" href="/roles/{{ $role->id }}/edit">Edit</a>
                            @endcan
                            @can('delete_roles')
                                <form action="/roles/{{ $role->id }}" method="POST">
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
        {{ $roles->links() }}
    </div>
</x-layout>
