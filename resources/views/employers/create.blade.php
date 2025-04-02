@extends('layouts.template')

@section('content')
    <h1 class="app-page-title">Employers</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Ajout</h3>
            <div class="section-intro">Ajouter un nouvel employer</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('employer.store') }}">

                        @csrf
                        @method('POST')

                        <!-- Departement -->
                        <div class="mb-3">
                            <label for="departement_id" class="form-label">Departement</label>
                            <select name="departement_id" id="departement_id" class="form-control">
                                <option value="" disabled selected>Selectionner le departement</option>

                                @foreach ($departements as $departement)
                                    <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                @endforeach

                            </select>

                            <div class="msg_input">
                                @error('departement_id')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>

                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input name="nom" value="{{ old('nom') }}" type="text" class="form-control" id="nom" placeholder="Entrer le nom">
                            <div class="msg_input">
                                @error('nom')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- Prenom -->
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input name="prenom" value="{{ old('prenom') }}" type="text" class="form-control" id="prenom" placeholder="Entrer le prenom">
                            <div class="msg_input">
                                @error('prenom')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name ="email" value="{{ old('email') }}" type="email" class="form-control" id="email" placeholder="Email">
                            <div class="msg_input">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>

                        <!-- Contact -->
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input name="contact" value="{{ old('contact') }}" type="text" class="form-control" id="contact" placeholder="Entrer le contact">
                            <div class="msg_input">
                                @error('contact')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- Montant journalier -->
                        <div class="mb-3">
                            <label for="montant_journalier" class="form-label">Montant journalier</label>
                            <input name="montant_journalier" value="{{ old('montant_journalier') }}" type="text" class="form-control" id="montant_journalier" placeholder="Entrer le montant journalier">
                            <div class="msg_input">
                                @error('montant_journalier')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>


                        <button type="submit" class="btn app-btn-primary" >Enregistrer</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->

@endsection






























