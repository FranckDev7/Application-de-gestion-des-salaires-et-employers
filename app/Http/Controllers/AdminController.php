<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAdminRequest;
use App\Http\Requests\updateAdminRequest;
use App\Models\ResetCodePassword;
use App\Notifications\SendEmailToAdminAfterRegistrationNotification;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function create ()
    {
        return view('admin.create');
    }

    public function edit (User $user)
    {
        return view('admin.edit', compact('user'));
    }

    public function store (storeAdminRequest $request)
    {
        try {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make('default');
            $user->save();

            /**
             * Si l'utilisateur se trouve dans la base de données et fait la demande de
             * réinitialisation de mot de passe
             */
            if ($user) {

                try {

                    // Supprime cet enregistrement (email et code de réinitialisation)
                    ResetCodePassword::where('mail', $user->email)->delete();
                    // Génère le code dynamiquement
                    $code = rand(1000, 4000);

                    $data = [
                        'code' => $code,
                        'email' =>$user->email
                    ];

                    // Crée un nouvel enregistrement dans la table
                    ResetCodePassword::create($data);

                    /**
                     * Envoie d'un mail pour que l'utilisateur puisse valider son compte
                     * Envoyer un code par mail pour verification du compte
                     */
                    Notification::route('mail', $user->email)->notify(new SendEmailToAdminAfterRegistrationNotification($code, $user->email));

                } catch (Exception $e) {
                    dd($e);
                    throw new Exception('Une erreur est survenue lors de l\'envoie du mail');
                }



            }

        } catch (Exception $e){
            //dd($e);
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de l\'enregistrement de l\'administrateur : ' . $e->getMessage());
            return redirect()->route('configurations.create')->withInput()->with('error_message', 'Une erreur est survenue lors de l\'enregistrement de l\'administrateur');
        }
    }

    public function update (updateAdminRequest $request)
    {
        try {
            //code...
        } catch (Exception $e){
            //dd($e);
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de la mise à jour des informations de l\'administrateur : ' . $e->getMessage());
            return redirect()->route('configurations.create')->withInput()->with('error_message', 'Une erreur est survenue lors de la mise à jour des informations de l\'administrateur');
        }
    }
    public function delete (User $user)
    {
        try {
            //code...
        } catch (Exception $e){
            //dd($e);
            // Logger l'exception et afficher un message d'erreur générique
            Log::error('Erreur lors de la suppression du compte de l\'administrateur : ' . $e->getMessage());
            return redirect()->route('configurations.create')->withInput()->with('error_message', 'Une erreur est survenue lors de la suppression du compte de l\'administrateur');
        }
    }


}
