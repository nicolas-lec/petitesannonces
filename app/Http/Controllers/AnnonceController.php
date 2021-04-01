<?php

namespace App\Http\Controllers;

use App\Annonces;
use App\Forms\PostForm;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class AnnonceController extends Controller
{

    private $formBuilder;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    public function index(){ }

    //Créé le formualaire pour ajouter une annonce
    public function create()
    {
        $form = $this->getForm();

    return view('annonces.create', compact('form'));
    }

    //Affiche le formualaire pour ajouter une annonce
    public function store()
    {
        $form = $this->getForm();
        $form->redirectIfNotValid();
        $form->getModel()->save();
    return redirect()->route('home');
    }

    //Création du nouvelle objet annonce
    public function getForm(?Annonces $annonces = null)
    {
        $annonces = $annonces ?: new Annonces ();

    return $this->formBuilder->create(PostForm::class, [
            'model' => $annonces
        ]);
    }

    //Affiche une annonce
    public function show($id)
    {
        //on récupère l'annonce avec son id
        $annonces = Annonces::findOrFail($id);

        return view('annonces.show', compact('annonces'));
    }

    //Modifie une annonce
    public function edit($id)
    {
        $annonces = Annonces::findOrFail($id);

        return view('annonces.edit', compact('annonces'));
    }

    //Ajoute une annonce
    public function storeAnnonce()
    {
        $attributes = request()->validate([
            'title',
            'slug',
            'content'
        ]);
        $annonces = Annonces::create($attributes);
        return redirect()->route('home');
    }

    //Supprime une annonce
    public function destroy($id)
    {
        $annonces = Annonces::findOrFail($id);
        $annonces->delete();
        return redirect()->route('home');
    }

    //MàJ d'une annonce
    public function update($id, Request $request)
    {

        $annonces = Annonces::findOrFail($id);

        $annonces->title = $request->title;
        $annonces->slug = $request->slug;
        $annonces->save();

        return redirect()->route('home')->with('success', 'Ton annonce a été modifiée');
        //TODO le success ne fonctionne pas
    }


}
