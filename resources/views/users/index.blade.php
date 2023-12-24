<x-backend.layouts.master>
    <x-slot name="pageTitle">
        User - Index
    </x-slot>

    <x-slot name="breadcrumb">
        <x-backend.partials.breadcrumb>
            <x-slot name="pageHeader">
                Users
            </x-slot>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
        </x-backend.partials.breadcrumb>
    </x-slot>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users List
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                    <th>Name</th>
                        <th>Email</th>
                        <th>Posts</th>
                    </tr>
                </thead>
                
                </tfoot>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <ul>
                                @foreach($user->posts as $post)
                                <li>{{ $post->post }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-backend.layouts.master>