<x-guest-layout>



    <div class="container mb-3">


        <div class="row mt-5">
            <div class="col-md-12">
                <div class="recent_activities p-4">
                    <div class="row justify-content-between">

                        <div class="col-md-5">
                            <div class="d-flex candi_det_div">
                                <div class="px-4">
                                    <div class="candidate_pic">
                                        <img class="img-fluid" src="{{asset($user->photo)}}" alt="">

                                    </div>
                            @if(Request::url() ===  route('candidate.detail'))         
                                    <div class="up_date_div">
                                        <i class="fa-solid fa-circle-plus in_fo_add "
                                             onclick="document.getElementById('getFile').click()"> </i>
                                        <form method="post" action="{{ route('user.update.info') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input id="getFile" style="display:none" type="file"
                                                onchange="form.submit()" name="photo" />
                                            <input type="hidden" name="old_photo" value="{{$user->photo}}" />
                                            <input type="hidden" name="fullname" value="{{$user->fullname}}" />
                                        </form>
                                    </div>
                                     @else
                                            
                                    @endif
                                </div>


                                <div class="">
                                    <div class="px-4">
                                        <h2 class="mb-1">{{ $user->fullname }}</h2>
                                        <p>{{ $user->job_title }}</p>
                                    </div>

                                    <div class="row px-4">
                                        <div class="mt-2 mb-2">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <samp class="bc">{{ $user->country.",".$user->city }}</samp>
                                        </div>
                                        <div class="mt-2 mb-2 px-2">
                                            <i class="fa-solid fa-business-time"></i>
                                            <span class="bc">
                                                {{ $user->job_type}}
                                            </span>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        @if(Request::url() ===  route('candidate.detail'))  
                        <div class="col-md-3 d-flex justify-content-end align-items-center">
                            <a class="applied_job2 w-100 h-100" href="{{ route('user.sub') }}">
                                <div class=" pt-3 pb-3">
                                    
                                       
                                    <div class="d-flex justify-content-end flex-column text-center">
                                        @php
                                    
                                        // Get the user's created date
                                        $createdDate = Auth::user()->created_at;
                                    
                                        // Parse the created date
                                        $start = \Carbon\Carbon::parse($createdDate);
                                    
                                        // Calculate the end date by adding 30 days to the start date
                                        $endDate = $start->copy()->addDays(30);
                                    
                                        // Calculate the remaining days from today to the end date
                                        $remainingDays = \Carbon\Carbon::now()->diffInDays($endDate, false);
                                        @endphp
                                        
                                        @if (Auth::user()->sub_id == null)
                                            <span>Essai ({{ $remainingDays }} jours restants!)</span>
                                        @elseif(Auth::user()->sub_id == 1)
                                            <span>Basic</span>
                                        @elseif(Auth::user()->sub_id == 2)
                                            <span>Prime</span>
                                        @endif
                                    
                                        <p>abonnement</p>
                                        <i class="fa-regular fa-bell app_icon"></i>

                                    </div>       
                                

                                   
                                </div>
                            </a>
                        </div>              
                        @endif

                        <div class="col-md-4 d-flex justify-content-sm-start justify-content-md-end align-items-center">
                            <div class=" d-flex justify-content-center align-items-center w-100 text-center mt-2">
                                <a class="w-100 recet_job_apply_btn bc" href="{{ url('message/'.$user->id) }}">Contactez
                                    moi</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 mt-4 p-2">
                        <div class="mt-5">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3 fw-bold">À propos Nom du candidat</h6>
                                
                                @if(Request::url() ===  route('candidate.detail'))         
                                     <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop1"></i>   
                                     @else
                                            
                                    @endif
                                    </div>
                                    <div class="exslio-list mt-3">
                                <ul>
                                    <li>
                                        <div class="esclio-110 bg-light rounded px-3 py-3">
                                            <div class="esclio-110-decs full-width">
                                                <p class="text-justify">{{ $user->about_info }}</p>
                                            </div>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div class="mt-5">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3 fw-bold">Qualification</h6>
                                   @if(Request::url() === route('candidate.detail'))  
                                     <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2"></i>

                                   @else
                                                                            
                                   @endif
                                                              
                            </div>
                            <div>
                                <div class="exslio-list mt-3">
                                    <ul>
                                        <li>
                                            <div class="esclio-110 bg-light rounded px-3 py-3">
                                                <h4 class="mb-0 ft-medium fs-md">Lycée</h4>
                                                <div class="esclio-110-info full-width mb-2">
                                                    <span class="text-muted me-2"><i
                                                            class="fa-solid fa-graduation-cap"></i>
                                                        {{ $user->school }}
                                                    </span>
                                                    <span class="text-muted me-2"><i
                                                            class="fa-regular fa-calendar-days"></i>
                                                        {{ $user->school_passing_year }}
                                                    </span>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="esclio-110 bg-light rounded px-3 py-3">
                                                <h4 class="mb-0 ft-medium fs-md">Intermédiaire</h4>
                                                <div class="esclio-110-info full-width mb-2">
                                                    <span class="text-muted me-2">
                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                        {{ $user->inter }}
                                                    </span>
                                                    <span class="text-muted me-2">
                                                        <i class="fa-regular fa-calendar-days"></i>
                                                        {{ $user->inter_passing_year }}
                                                    </span>
                                                </div>

                                            </div>
                                        </li>

                                        <li>
                                            <div class="esclio-110 bg-light rounded px-3 py-3">
                                                <h4 class="mb-0 ft-medium fs-md">L'obtention du diplôme</h4>
                                                <div class="esclio-110-info full-width mb-2">
                                                    <span class="text-muted me-2">
                                                        <i class="fa-solid fa-graduation-cap"></i>
                                                        {{ $user->graduation }}
                                                    </span>
                                                    <span class="text-muted me-2">
                                                        <i class="fa-regular fa-calendar-days"></i>
                                                        {{ $user->graduation_passing_year }}
                                                    </span>
                                                </div>

                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="mt-5">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-3 fw-bold">Expérience</h6>
                                       @if(Request::url() ===  route('candidate.detail'))   
                                        <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop3"></i>

                                           @else
                                                                                    
                                           @endif
                                   
                                </div>
                                <div>
                                    <div class="exslio-list mt-3">
                                        <ul>
                                            <li>
                                                <div class="esclio-110 bg-light rounded px-3 py-3">
                                                    <h4 class="mb-0 ft-medium fs-md">{{ $user->company_name }}</h4>

                                                    <div class="esclio-110-info full-width mb-2">
                                                        <span class="text-muted me-2">
                                                            {{ $user->about_company }}
                                                        </span>
                                                    </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>


                            <div class="mt-5">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-3 fw-bold">Compétences fondamentales</h6>
                                       @if(Request::url() ===  route('candidate.detail')) 
                                        <i class="fa-solid fa-circle-plus in_fo_add" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop4"></i>

                                       @else
                                                                                
                                       @endif
                                   
                                </div>
                                <div class="exslio-list mt-3">

                                    <ul>
                                        <li>
                                            <div class="esclio-110 bg-light rounded px-3 py-3">
                                                <div class="esclio-110-decs full-width">
                                                    @isset($user->tag)
                                                    @foreach($user->tag as $tag)
                                                    @php
                                                    $values = explode(' ', $tag);
                                                    @endphp

                                                    @foreach($values as $value)
                                                    <span class="tag_btn">{{ ucfirst($value) }}</span>
                                                    @endforeach
                                                    @endforeach
                                                    @endisset

                                                </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--About Name of candidate Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">À propos Nom du candidat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class=" mt-3">
                            <div class="accoun_btn_div">

                                <textarea class="col-form-label w-100 p-3" name="bio"
                                    placeholder="À propos Nom du candidat">{{ $user->about_info }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>



            </div>

        </div>
    </div>
    <!--Qualification Modal -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Qualification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">High School</label>
                                </div>
                                <input type="text" name="school" value="{{ $user->school }}" class="form-control"
                                    placeholder="High School Name">
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">High School Passing Year</label>
                                </div>
                                <input type="text" name="school_passing_year" value="{{ $user->school_passing_year }}"
                                    class="form-control" placeholder="High School Passing Year">

                                @error('school_passing_year')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Inter Medium</label>
                                </div>
                                <input type="text" name="inter" value="{{ $user->inter }}" class="form-control"
                                    placeholder="Inter Medium Name">
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Inter Medium Passing Year</label>
                                </div>
                                <input type="text" name="inter_passing_year" value="{{ $user->inter_passing_year }}"
                                    class="form-control" placeholder="High School Passing Year">

                                @error('inter_passing_year')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            @error('school_passing_year')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Graduation</label>
                                </div>
                                <input type="text" name="graduation" value="{{ $user->graduation }}"
                                    class="form-control" placeholder="Graduation">
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Graduation Passing Year</label>
                                </div>
                                <input type="text" name="graduation_passing_year"
                                    value="{{ $user->graduation_passing_year }}" class="form-control"
                                    placeholder="Graduation Passing Year">

                                @error('graduation_passing_year')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Experience Modal -->
    <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">à propos de votre expérience</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="col-md-12">
                                <div>
                                    <label class="col-form-label">Nom de l'entreprise</label>
                                </div>
                                <input type="text" name="company_name" value="{{ $user->company_name }}"
                                    class="form-control" placeholder="Nom de l'entreprise">
                            </div>

                            <div class="col-md-12">
                                <div>
                                    <label class="col-form-label">à propos de la société</label>
                                </div>
                                <textarea type="text" name="about_company" class="form-control"
                                    placeholder="à propos de la société">{{ $user->about_company }}</textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Tag Modal -->
    <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Compétences fondamentales</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="{{ route('user.update.info') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label class="col-form-label">Tag</label>
                            {{-- {{ dd($user->tag) }} --}}

                            <input type="text" id="tag"
                                value="@isset($user->tag) @foreach($user->tag as $key => $tag) {{ $tag }} @endforeach @endisset"
                                name="tag" class="form-control" data-role="tagsinput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <div class="accoun_btn_div">
                            <input class="w-100 btn btn-success" type="submit" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap-tagsinput.css">
    <script src="{{ asset('user') }}/js/bootstrap-tagsinput.js"></script>

    <script>
        $("#tag").tagsinput()
    </script>
    @endpush
</x-guest-layout>