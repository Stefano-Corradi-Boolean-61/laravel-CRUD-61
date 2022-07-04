<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Pasta;

class PastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastas = Pasta::orderBy('id','desc')->get();
        return view('pastas.index', compact('pastas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // qui richiamo la vista contenete il form del create
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastaRequest $request)
    {
        // la validazione avviene in PastaRequest
        // questo metodo riceve in post dalla rotta pastas.store tutti gli elementi del form presenti in create
        //dd($request->all());


        // salvo in $data tutta la nostra request
        $data = $request->all();


        // salvo i dati nel DB
        // creo una nuova pasta alla quale associo i dati della request per salvarli nel db
        $new_pasta = new Pasta();

        // metodo di inserimento senza elementi fillabili
        // $new_pasta->name = $data['name'];
        // $new_pasta->type = $data['type'];
        // $new_pasta->description = $data['description'];
        // $new_pasta->image = $data['image'];
        // $new_pasta->slug = Str::slug($data['name'],'-');

        // metodo di inseriminto con impostato $fillable nel model
        $data['slug'] = $this->createSlug($data['name']);
        $new_pasta->fill($data);

        $new_pasta->save();

        // reindirizzo alla show del nuovo elemento salvato
        return redirect()->route('pastas.show', $new_pasta);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id è il parametro passato in GET dalla rotta pastas.show
        $pasta = Pasta::find($id);
        if($pasta){
            return view('pastas.show', compact('pasta'));
        }
        abort(404, 'Prodotto non presente nel database');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasta = Pasta::find($id);
        if($pasta){
            return view('pastas.edit', compact('pasta'));
        }
        abort(404, 'Prodotto non presente nel database');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // passando $pasta e non $id come secondo parametro otteniamo l'ggetto della query ad db
    // quindi laravel dietro le quinte esegue $pasta = Pasta::find($id);
    public function update(PastaRequest $request, Pasta $pasta)
    {
        // la validazione avviene in PastaRequest
        // modalità in cui passo $id e non $pasta
        //$pasta = Pasta::find($id);


        //dd($request->all(),$id);
        //....
        // salvo la request in data
        $data = $request->all();

        if($pasta->name != $data['name']){
            $data['slug'] = $this->createSlug($data['name']);
        }else{
            $data['slug'] = $pasta->slug;
        }


        $pasta->update($data);

        // reindirizzo alla show
        return redirect()->route('pastas.show', $pasta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasta $pasta)
    {
        // anche se di default richiede $id per noi è più comodo ricevere l'entità
        // quindi alla funzione passo come parametro Pasta perché dietro le quinte viene fatto il find per id

        $pasta->delete();

        // reindirizzo all'elenco dei prodotti
        // con with metto in sessione l'avvenuta eliminazione
        return redirect()->route('pastas.index')->with('prodotto_cancellato', "La pasta $pasta->name è stata eliminata correttamente");
    }

    private function createSlug($string){
        // faccio i controlli e retstituisco lo slug
        $slug = Str::slug($string ,'-');
        $control_slug = Pasta::where('slug',$slug)->first();
        if($control_slug){
            // se esiste lo slug
            $slug = $control_slug->slug . "-" . rand(1000,10000);
        }
        return $slug;
    }



}
