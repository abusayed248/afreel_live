<x-app-layout>


    <div class="container">
        <div class="row">

           <div class="col-md-12">
                <div class="row db_div">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                               Retirer
                                <a style="float: right" href="#" class="btn btn-success withdraw">Demande de retrait</a>
                            </div>
                            <div class="card-body">
                                
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nom du Vendeur</th>
                                            <th>montant</th>
                                            <th>Statut</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->seller->name }}
                                                    ( {{ $item->seller->email }} )
                                                </td>
                                                <td>{{ $item->amount }}</td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <span class="badge badge-warning" style="background: #fe9536">Pending</span>
                                                    @else
                                                        <span class="badge badge-success" style="background: green">Success</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M,Y') }}
                                                </td>
                                                {{-- <td>$320,800</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal withdraw-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Faire une demande de retrait</h5>
            </div>
            <div class="modal-body">
              <form action="{{ route('user.withdraw') }}" method="post">
                @csrf
                <label>Montant</label>
                <input type="number" max="{{ Auth::user()->wallet }}" name="amount" class="form-control" required>
                <br>
                <label>Mode de paiement</label>
                <select name="type" class="form-control method" required>
                    <option value="" selected disabled>Sélectionnez la méthode</option>
                    <option value="OM">OM</option>
                    <option value="MTN">MTN</option>
                    <option value="MOOV">MOOV</option>
                    <option value="WAVE">WAVE</option>
                    <option value="BANK">BANK</option>
                </select>
                <div class="meth">

                </div>

                
  <div class="modal-footer d-flex justify-content-end align-items-center">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-success " style="float: right">Demande</button>
            </div>
              </form>
            </div>
          
          </div>
        </div>
      </div>


    @push('script')
    <script>
        $('.withdraw').on('click', function(){
            $('.withdraw-modal').modal('show');
        })
    </script>

    <script>
        $('.method').on('change', function(){
            val = $('.method').val();

            $('.meth').empty();

            if (val == 'BANK') {
                html = `<br>
                <label>Bank Name</label>
                <input type="text" name="bank_name" class="form-control" required>
                <br>
                <label>Account Name</label>
                <input type="text" name="account_name" class="form-control" required>
                <br>
                <label>Account Number</label>
                <input type="text" name="account_number" class="form-control" required>
                <br>
                <label>Routing Number</label>
                <input type="text" name="routing_number" class="form-control" required>`;
            } else {
                html = `<br>
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>`;
            }

            $('.meth').html(html);


        })
    </script>

    @endpush


</x-app-layout>
