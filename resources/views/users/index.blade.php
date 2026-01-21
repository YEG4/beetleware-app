<x-layout title="Users">
    @can('create_users')
        <div class="flex justify-end p-4"><a href="/users/create" class="btn btn-primary">Create a User</a></div>
    @endcan

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="flex gap-2">
                            @can('edit_users')
                                <a class="btn btn-secondary" href="/users/{{ $user->id }}/edit">Edit</a>
                            @endcan
                            @can('delete_users')
                                <form action="/users/{{ $user->id }}" method="POST">
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
        {{ $users->links() }}
    </div>
</x-layout>
