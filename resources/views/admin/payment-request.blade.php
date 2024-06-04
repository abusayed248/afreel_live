<x-admin-app-layout>

    <div id="layoutSidenav">
       @include('admin.component.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Payment Request</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Payment Request</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Requests
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Buyer Name</th>
                                        <th>Seller Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        {{-- <th>Salary</th> --}}
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Buyer Name</th>
                                        <th>Seller Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        {{-- <th>Salary</th> --}}
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                {{ $item->buyer->name }}
                                                ( {{ $item->buyer->email }} )
                                            </td>
                                            <td>
                                                {{ $item->seller->name }}
                                                ( {{ $item->seller->email }} )
                                            </td>
                                            <td>{{ $item->amount }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <span class="badge badge-warning" style="background: yellow">Pending</span>
                                                @else
                                                    <span class="badge badge-success" style="background: green">Success</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <a href="{{ route('admin.payment.approve',[$item->id]) }}" class="btn btn-success">Approve</a>
                                                @endif
                                            </td>
                                            {{-- <td>$320,800</td> --}}
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
