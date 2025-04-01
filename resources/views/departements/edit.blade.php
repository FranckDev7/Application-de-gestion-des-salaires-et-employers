@extends('layouts.template')

@section('content')
    <h1 class="app-page-title">Departements</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Editer</h3>
            <div class="section-intro">Editer un département</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('departement.update', $departement->id) }}">

                        @csrf
                        @method('PUT')

                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nom</label>
                            <input name="name" value="{{ $departement->name }}" type="text" class="form-control" id="setting-input-1" placeholder="Entrer le nom">

                            <div class="msg_input">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>


                        <button type="submit" class="btn app-btn-primary" >Mettre à jour</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->

@endsection






























