<?php

class Pasta{

	public $nome;
	public $immagine;
	public $tipo;
	
	public function __construct($_nome, $_immagine, $_tipo) {
		$this->nome = $_nome;
		$this->immagine = $_immagine;
		$this->tipo = $_tipo;
	}
}

return [
	new Pasta("N.4 Spaghetto Quadrato Bucato", "https://www.lamolisana.it/wp-content/uploads/2021/09/4-spaghetto-quadrato-bucato.jpg", "lunga"),
	new Pasta("N.5 Fettuccine", "https://www.lamolisana.it/wp-content/uploads/2021/04/5-fettuccine.jpg", "lunga"),
	new Pasta("N.6 Linguine", "https://www.lamolisana.it/wp-content/uploads/2021/04/6-linguine.jpg", "lunga"),
	new Pasta("N.7 Mezze Linguine", "https://www.lamolisana.it/wp-content/uploads/2021/04/7-mezze-linguine.jpg", "lunga"),
	new Pasta("N.11 Spaghettino Quadrato", "https://www.lamolisana.it/wp-content/uploads/2021/04/11-spaghettino-quadrato.jpg", "lunga"),
	new Pasta("N.12 Bucatini", "https://www.lamolisana.it/wp-content/uploads/2021/04/12-bucatini.jpg", "lunga"),
	new Pasta("N.38 Mezze maniche", "https://www.lamolisana.it/wp-content/uploads/2021/05/38-mezze-maniche.jpg", "lunga"),
	new Pasta("N.44 Sedani", "https://www.lamolisana.it/wp-content/uploads/2021/05/44-sedani.jpg", "lunga"),
	new Pasta("N.49 Sedanini", "https://www.lamolisana.it/wp-content/uploads/2021/05/49-sedani.jpg", "corta"),
	new Pasta("N.53 Lumachine", "https://www.lamolisana.it/wp-content/uploads/2021/05/53-lumachine.jpg", "corta"),
	new Pasta("N.55 Chifferi rigati", "https://www.lamolisana.it/wp-content/uploads/2021/05/55-chifferi-rigati.jpg", "corta"),
	new Pasta("N.58 Misto corto", "https://www.lamolisana.it/wp-content/uploads/2021/05/58-misto-corto.jpg", "corta"),
	new Pasta("N.61 Semi di Melone", "https://www.lamolisana.it/wp-content/uploads/2021/06/61-semi-di-melone.jpg", "cortissima"),
	new Pasta("N.84 Ditale Quadrato", "https://www.lamolisana.it/wp-content/uploads/2021/06/84-ditale-quadrato.jpg", "cortissima"),
];