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
                                        <th>Post Title</th>
                                        <th>Photo</th>
                                        <th>Created Post</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($enterprises as $key => $enterprise)
                                    <tr>
                                        <td class="">{{ ++$key }}</td>
                                        <td class="">
                                            {{ $enterprise->title }}
                                        </td>

                                        <td class="">
                                            <img style="height:80px; width: 80px;" src="{{asset($enterprise->photo)}}"
                                                alt="">
                                        </td>
                                        <td class="">
                                            {{ $enterprise->created_at }}
                                        </td>
                                        <td colspan="2" class="">
                                            <a href="{{ route('admin.enterprises.destroy', $enterprise->id) }}"
                                                class="btn btn-danger">Delete </a>
                                            {{-- <a href="#" class="btn btn-warning">Deactive </a> --}}
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