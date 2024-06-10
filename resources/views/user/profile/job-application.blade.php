<x-app-layout>

    <div class="container mb-3">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="recent_activities p-3">

                    <h3 class="d-flex align-content-center "><i class="fa-regular fa-file bc mx-2"></i>Demande d'emploi
                    </h3>

                    <form action="{{ route('store.applied.job') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="post_id" value="{{ $id }}">

                        <div class="m-3 row">
                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">combien d'argent veux tu</label>
                                </div>
                                <input type="number" class="form-control w-100" name="seller_amount" min="5"
                                    value="{{ old('seller_amount') }}" placeholder="Votre besoin Montant">

                                @error('seller_amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <label class="col-form-label">Combien de temps cela prendra-t-il</label>
                                </div>

                                <select class="form-select w-100" name="seller_deadline">
                                    <option selected disabled selected>Sélectionnez-en un</option>
                                    <option {{ old('seller_deadline')=='7' ?'selected':'' }} value="7">Moins de 7 jours
                                    </option>
                                    <option {{ old('seller_deadline')=='15' ?'selected':'' }} value="15">Moins de 15
                                        jours</option>
                                    <option {{ old('seller_deadline')=='30' ?'selected':'' }} value="30">Moins de 30
                                        jours</option>
                                    <option {{ old('seller_deadline')=='180' ?'selected':'' }} value="180">Moins de 6
                                        mois</option>
                                    <option {{ old('seller_deadline')=='365' ?'selected':'' }} value="365">Moins de 1 an
                                    </option>
                                </select>

                                @error('seller_deadline')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>


                        <div class="row m-3 ">
                            <div class="col-md-12">
                                <div>
                                    <label class="col-form-label">Lettre de motivation</label>
                                </div>
                                <div>
                                    <textarea id="editor" class="col-form-label w-100 p-3" name="cover_letter"
                                        placeholder="Lettre de motivation">{{ old('cover_letter') }}</textarea>

                                    @error('cover_letter')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="m-3 row">
                            <div class="col-md-12">
                                <div>
                                    <label class="col-form-label">Déposer</label>
                                </div>
                                <input type="file" class="form-control w-100" name="file">
                                @error('file')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="m-3 row">
                            <div class=" mt-3">
                                <input class="w-100 btn btn-success" type="submit" value="Soumettre une proposition
">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    @push('script')
    <link rel="stylesheet" href="{{ asset('user') }}/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="{{ asset('user') }}/js/bootstrap-tagsinput.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script>
        //tag
        $("#tag").tagsinput();

        //datepicker 
        $("#deadline").flatpickr({
            enableTime: false,
            dateFormat: "Y/m/d",
            defaultDate: "2024-04-02"
        });
    </script>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

    @endpush

</x-app-layout>