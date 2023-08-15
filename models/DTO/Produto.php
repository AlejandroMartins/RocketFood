<?php

class Produto
{

    //Atributos class
    private $id;
    private $nome;
    private $valor;
    private $descricao;


    //Constructor
    public function __construct($f, $m, $a, $id = null){
        $this->nome = $m;
        $this->valor = $f;
        $this->descricao = $a;
        $this->id = $id;  
    }



	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getValor() {
		return $this->valor;
	}
	
	/**
	 * @param mixed $valor 
	 * @return self
	 */
	public function setValor($valor): self {
		$this->valor = $valor;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescricao() {
		return $this->descricao;
	}
	
	/**
	 * @param mixed $descricao 
	 * @return self
	 */
	public function setDescricao($descricao): self {
		$this->descricao = $descricao;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNome() {
		return $this->nome;
	}
	
	/**
	 * @param mixed $nome 
	 * @return self
	 */
	public function setNome($nome): self {
		$this->nome = $nome;
		return $this;
	}
}