<x-admin-app-layout>

    <div id="layoutSidenav">
       @include('admin.component.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 class="mt-4">Admin Manage</h1>
                        </div>
                        <div class="col-md-5 text-end">
                            <a href="{{ route('admin.create.admin') }}" class="btn btn-success mt-4">Create Admin+</a>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Admin Manage
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Admin Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($admins as $key => $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            
                                            <td>{{ $user->email }}</td>
                                            <td colspan="2">
                                                <a href="{{ route('admin.delete.admin', $user->id) }}" class="btn btn-danger">Delete </a>
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
