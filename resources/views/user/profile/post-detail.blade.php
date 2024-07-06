<x-app-layout>


    <div class="container mb-3">
        <div class="row">
                         <div class="col-md-12 p-3 recent_activities">
                            <div class="d-flex candi_det_div">
                                <div class="px-4">
                                    <div class="candidate_pic">
                                       <img class="img-fluid" src="{{ asset($post->photo) }}" alt="">
                                 </div>
                                </div>
                                <div class="">
                                    <div class="px-4 d-flex">
                                        <h2 class="mb-1">{{ $post->title }}</h2>
                                    </div>
                                      <div class="row px-4">
                                        <div class="mt-2 mb-2">
                                            <i class="fa-regular fa-envelope mx-2"></i>
                                           {{ $post->email }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12 mt-4 p-2">
                            <h6 class="mb-3 fw-bold">Description</h6>
                            <p>{{$post->details}}</p>
                        </div>
            </div>
                    </div>

    </div>


    @push('script')
    <script src="{{ asset('user/js/share.js') }}"></script>
    @endpush

</x-app-layout>
