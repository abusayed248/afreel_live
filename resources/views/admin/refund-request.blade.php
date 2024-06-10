<x-admin-app-layout>

    <div id="layoutSidenav">
       @include('admin.component.sidebar')
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Refund Request</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Refund Request</li>
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
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        {{-- <th>Salary</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>
                                                {{ $item->buyer->name }}
                                                ( {{ $item->buyer->email }} )
                                            </td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->payment_type }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <span class="badge badge-warning" style="background: rgb(211, 115, 6)">Pending</span>
                                                @else
                                                    <span class="badge badge-success" style="background: green">Success</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">Details</a>
                                                @if ($item->status == 0)
                                                    <a href="{{ route('admin.refund.approve',[$item->id]) }}" class="btn btn-success">Approve</a>
                                                @endif
                                            </td>
                                            {{-- <td>$320,800</td> --}}
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Payment Details</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <label>Payment Method</label>
                                                    <input type="text" value="{{ $item->payment_type }}" class="form-control" readonly>
                                                    <br>
                                                    <label>Amount</label>
                                                    <input type="text" value="{{ $item->amount }}" class="form-control" readonly>
                                                    <br>
                                                    @if ($item->payment_type == 'BANK')
                                                        <label>Bank Name</label>
                                                        <input type="text" value="{{ $item->bank_name }}" class="form-control" readonly>
                                                        <br>
                                                        <label>Account Name</label>
                                                        <input type="text" value="{{ $item->account_name }}" class="form-control" readonly>
                                                        <br>
                                                        <label>Account Number</label>
                                                        <input type="text" value="{{ $item->account_number }}" class="form-control" readonly>
                                                        <br>
                                                        <label>Routing Number</label>
                                                        <input type="text" value="{{ $item->routing_number }}" class="form-control" readonly>
                                                        <br>
                                                    @else
                                                        <label>Phone Number</label>
                                                        <input type="text" value="{{ $item->phone }}" class="form-control" readonly>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
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
