<x-app-layout>


    <div class="container mb-3">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="recent_activities  px-5 py-3">
                    <div class="row">
                         <div class="col-md-12">
                            <div class="d-flex candi_det_div">
                                <div class="px-4">
                                    <div class="candidate_pic">
                                       @if(!empty($post->user->photo))
                                        <img class="img-fluid" src="{{ asset($post->user->photo) }}" alt="">
                                         @endif
                                    </div>
                                </div>
                                <div class="">
                                    <div class="px-4 d-flex">
                                        <h2 class="mb-1">{{ $post->job_title }}</h2>
                                    </div>
                                      <div class="row px-4">
                                        <div class="mt-2 mb-2">
                                             @if(!empty($post->user->photo))
                                              <i class="fa-solid fa-location-dot"></i>
                                                <samp class="bc">{{ $post->user->country.', '.$post->user->city }}</samp>
                                              @endif
                                          </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                        <div class="col-md-12 mt-4 p-2">
                            <h6 class="mb-3 fw-bold">Description de l'emploi</h6>
                            <p>{!! $post->job_description !!}</p>
                             <h6 class="mt-3 fw-bold">Budget</h6>
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 fw-bold">Montante</div>
                                <div class="col-md-8 px-3">
                                    <i class="fa-solid fa-franc-sign"></i>
                                    {{ $post->amount }}
                                </div>
                            </div>
                             <h6 class="mt-3 fw-bold">Compétences requises</h6>
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 fw-bold">Type d'emploi</div>
                                <div class="col-md-8 px-3">
                                    {{ ucwords(implode(' ',preg_split('/(?=[A-Z])/', $post->job_type))) }}
                                </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 fw-bold">catégorie d'emploi</div>
                                <div class="col-md-8 px-3 "> {{ ucwords(implode(' ',preg_split('/(?=[A-Z])/', $post->job_category))) }} </div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 fw-bold">Niveau de carrière</div>
                                <div class="col-md-8 px-3 ">{{ ucwords(implode(' ',preg_split('/(?=[A-Z])/', $post->career_level))) }}</div>
                            </div>
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 fw-bold">Genre</div>
                                <div class="col-md-8 px-3 ">{{ ucwords(implode(' ',preg_split('/(?=[A-Z])/', $post->gender))) }}</div>
                            </div>

                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 fw-bold">Date limite d'inscription</div>
                                <div class="col-md-8  px-3 ">{{ $post->deadline }}</div>
                            </div>

                            @if($post->file)
                            <div class="d-flex mt-2">
                                <div class="col-md-4 px-3 fw-bold">Déposer</div>
                                <div class="col-md-8  px-3 ">
                                    <a href="{{ asset($post->file) }}" class="bc" title="Click to download this file">Télécharger un fichier</a>
                                </div>
                            </div>
                            @endif

                            <div class="mt-5">
                                <div class="col-md-4 fw-bold mb-2">Compétences fondamentales</div>
                                <div class="col-md-12 d-flex flex-wrap">
                                    @php
                                        $skills = $post->skill;
                                    @endphp

                                    @if ($skills)
                                        @foreach($skills as $skill)
                                            <div class="tag_btn">{{ $skill }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class=" m-3 d-flex justify-content-between">
                        <div class=" mt-3">
                            @php
                            $apply_job = \App\Models\Job_aplication::where(['seller_id' => auth()->user()->id, 'post_id' => $post->id])->first();
                            $notApply_job = \App\Models\Post::where('user_id', '=', $post->user_id)->first();
                            $hireCheck = \App\Models\Hire::where('post_id', '=', $post->id)->first();
                            @endphp

                            @if($notApply_job->user->id != Auth::user()->id)
                                @if(!$hireCheck)
                                    @if(!$apply_job)
                                    <a class="btn btn-success" href="{{ route('job.aplication', ['slug' => $post->slug, 'id' => $post->id]) }}">Postuler à un emploi </a>
                                    @else
                                    <button type="button" class="btn btn-warning" disabled>Vous êtes postulé ! </button>
                                    @endif
                                @else
                                    <button type="button" class="btn btn-danger" disabled>Emploi fermé </button>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('script')
    <script src="{{ asset('user/js/share.js') }}"></script>
    @endpush

</x-app-layout>
