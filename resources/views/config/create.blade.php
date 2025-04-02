@extends('layouts.template')

@section('content')
    <h1 class="app-page-title">Configurations</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Ajout</h3>
            <div class="section-intro">
                Ajouter une nouvelle configuration</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="POST" action="{{ route('configurations.store') }}">

                        @csrf
                        @method('POST')

                        {{-- Vérifiez s'il y a une clé nommée 'success_message' dans la session --}}
                        @if (Session::get('error_message'))
                            {{-- S'il y a cette clé, Afficher sa valeur --}}
                            <p class="msg_block">
                                {{ Session::get('error_message') }}
                            </p>
                        @endif

                        <!-- Type de la configuration -->
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Type de la configuration</label>
                            <select name="type" id="type" class="form-control">
                                <option value="" disabled selected>Type de configuration</option>
                                <option value="PAYMENT_DATE">Date de paiement</option>
                                <option value="APP_NAME">Nom de l'application</option>
                                <option value="DEVELOPPER_NAME">Equipe de developpement</option>
                                <option value="ANOTHER">Autres options</option>
                            </select>

                            <div class="msg_input">
                                @error('type')
                                    {{ $message }}
                                @enderror
                            </div>

                        </div>
                        <!-- Valeur -->
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Valeur</label>
                            <input name="value" value="{{ old('value') }}" type="text" class="form-control" id="setting-input-1" placeholder="Entrer la valeur">

                            <div class="msg_input">
                                @error('value')
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






























