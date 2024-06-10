<x-app-layout>

@if(isset($sellerHireDetails))
@php
    $seller_deadline = $sellerHireDetails->applier->seller_deadline;
    $hire_date       = $sellerHireDetails->created_at;

    $startDateTime = new DateTime($hire_date);

    // Number of days to add (dynamic)
    $daysToAdd = intval($seller_deadline); // For example, you can set this dynamically

    // Add dynamic number of days to the starting date and time
    $startDateTime->modify("+$daysToAdd days");

    // Format the date as "YYYY-MM-DD"
    $formattedDate = $startDateTime->format('Y-m-d');
@endphp

@push('countdown')
    <style>
    .countdown {
      font-family: 'Roboto';
      text-transform: uppercase;
    }

    .countdown > div { display: inline-block; }

    .countdown > div > span {
      display: block;
      text-align: center;
    }

    .countdown-container { margin: 0 3px; }

    .countdown-container .countdown-heading {
      font-size: 11px;
      margin: 3px;
      color: black
    }

    .w-48 {
      width: 48%
    }

    .countdown-container .countdown-value {
      font-size: 25px;
      background: var(--blue) !important;
      padding: 10px;
      color: #fff;
      text-shadow: 2px 2px 2px rgba(0,0,0,0.4)
    }

    </style>
@endpush

    <div class="container mt-4">
        <div class="row">

          <div class="col-md-12">

                <h3 class="mb-3"><span class="mx-3 bc"><i class="fas fa-users"></i></span>Détails de votre commande</h3>

                <div class="row db_div recent_activities p-2 mb-3">
                    <div class="p-2 d-flex  align-items-center flex-wrap mt-3">

                        <div class="recet_job_title_div col-md-7">
                            <h5 class="p-1">{{ Str::limit($sellerHireDetails->post->job_title, 50) }}</h5>
                        </div>

                        <div class="recet_job_title_div col-md-5 text-end">
                            <div>
                                <div class='countdown' data-date="{{ $formattedDate }}"></div>
                            </div>
                        </div>
                    </div>

                    @php
                    $delivery = \App\Models\Delivery::with('seller', 'post', 'buyer')->where(['post_id' => $sellerHireDetails->post->id])->first();
                    @endphp

                    <div class="row mt-3">
                        <div class="p-2">
                            <p><span style="margin-right: 5px;">Note: </span>{{ $delivery->note ?? null}}</p>

                            @if ($delivery)
                                <p>Pièce jointe: <a href="{{ route('download.delivery.order.attachment', $delivery->id) }}" class="bc" >Download File</a></p>
                            @endif

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('order.delivery') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" name="buyer_id" value="{{ $sellerHireDetails->buyer_id }}">
                                <input type="hidden" name="seller_id" value="{{ $sellerHireDetails->seller_id }}">
                                <input type="hidden" name="post_id" value="{{ $sellerHireDetails->post->id }}">

                                @if(!$jobPoster)

                                <div class=" mt-3">
                                    <div class="accoun_btn_div">
                                         <label class="col-form-label" form="note">Note</label>
                                         <textarea class="col-form-label w-100 p-3" name="note" placeholder="Saisir une note..."></textarea>

                                         @error('note')
                                            <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                @endif

                                <div class=" mt-3">
                                    <div class="accoun_btn_div ">
                                        @if(!$jobPoster)

                                         <label class="col-form-label" form="attachment">Attachment</label>
                                         <input type="file" class="col-form-label w-100 py-2" name="attachment" />

                                         @error('attachment')
                                            <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                        @endif

                                         @if ($sellerHireDetails->post->user_id == Auth::user()->id)
                                            @if ($sellerHireDetails->post->order_complete != 1)
                                            <div class="row justify-content-between ">
                                                <a href="{{ route('accept-order',  $sellerHireDetails->id) }}"  class="col-form-label col-md-6 btn btn-success mt-2 w-48 py-2">Accepteur</a>

                                                <a id="cancelOrder" href="{{ route('order.cancel', $sellerHireDetails->id) }}" class="col-form-label col-md-6 btn btn-danger mt-2 w-48 py-2">Annuler</a>
                                            </div>
                                            @endif
                                         @else
                                            <button type="submit" class="col-form-label btn btn-success mt-2 w-100 py-2">Livraison de la commande</button>
                                         @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('script')
    <script src="{{ asset('user') }}//flipdown/countdown.js"></script>

    <script>
        $('#cancelOrder').click( function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            Swal.fire({
              title: "Es-tu sûr?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#11c759",
              cancelButtonColor: "#d33",
              confirmButtonText: "Oui, annulez-le!"
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire({
                  title: "Annuler!",
                  text: "Votre commande a été annulée.",
                  icon: "success"
                });
                window.location.href = url
              }
            });
        });
    </script>
    @endpush

@else
    @php
     header('Location: ' . url('/'));
     exit();
    @endphp
@endif
</x-app-layout>
