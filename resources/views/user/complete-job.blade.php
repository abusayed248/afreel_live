<x-app-layout>


    <div class="container mb-3">
        <div class="row">

            <div class="col-md-12">

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="recent_activities">
                            <div class="invoice p-4">
                                <h3>Travaux terminés</h3>
                            </div>

                            @if(!empty($completeJobs) && count($completeJobs) > 0)
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Titre d'emploi</th>
                                    <th scope="col">Montante</th>
                                    <th scope="col">Nom</th>
                                  </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($completeJobs as $key => $completeJob)
                                  <tr>
                                    <td>{{ $completeJob->job_title }}</td>
                                    <td><i class="fa-solid fa-franc-sign mx-2"></i>{{ $completeJob->amount }}</td>
                                    <td>
                                        @if(auth()->user()->id == $completeJob->seller_id)
                                        <a href="{{ route('candidate.profile.details', $completeJob->buyer_id) }}" class="bc">{{ $completeJob->buyer->fullname }}</a>
                                        @endif
                                        @if(auth()->user()->id == $completeJob->buyer_id)
                                        <a href="{{ route('candidate.profile.details', $completeJob->seller_id) }}" class="bc">{{ $completeJob->seller->fullname }}</a>
                                        @endif
                                    </td>
                                  </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>