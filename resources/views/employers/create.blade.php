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
                    <form class="settings-form" method="POST" action="">

                        @csrf
                        @method('POST')

                        <!-- Departement -->
                        <div class="mb-3">
                            <label for="departement_id" class="form-label">Departement</label>
                            <select name="Departement" id="Departement" class="form-control">
                                <option value=""></option>
                            </select>

                        </div>

                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Nom</label>
                            <input name="first_name" type="text" class="form-control" id="setting-input-1" placeholder="Entrer le nom" required>
                        </div>

                        <!-- Prenom -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Prenom</label>
                            <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Entrer le prenom">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Contact</label>
                            <input name="phone" type="text" class="form-control" id="phone" placeholder="Entrer le contact">
                        </div>

                        <button type="submit" class="btn app-btn-primary" >Enregistrer</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->

@endsection






























