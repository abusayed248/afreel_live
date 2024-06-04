<x-admin-app-layout>

    <div id="layoutSidenav">
       @include('admin.component.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">User Manage</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            User Manage
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>User name</th>
                                        <th>User Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>
                                                {{ $user->username }}
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td colspan="2">
                                                <a href="{{ route('admin.user.delete', $user->id) }}" class="btn btn-danger">Delete </a>
                                                <a href="#" class="btn btn-warning">Deactive </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</x-admin-app-layout>
