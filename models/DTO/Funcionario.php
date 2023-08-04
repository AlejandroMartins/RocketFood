<?php

class Funcionario
{

    //Atributos class
    private $id;
    private $nome;
    private $telefone;
    private $usuario;
    private $senha;
	private $nivel_acesso;



    //Constructor
    public function __construct($f, $m, $u, $s, $n, $id = null){
        $this->nome = $f;
        $this->telefone = $m;
        $this->usuario = $u;
        $this->senha = $s;
		$this->nivel_acesso = $n;
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

    public function getTelefone() {
		return $this->telefone;
	}
	
	/**
	 * @param mixed $nome 
	 * @return self
	 */
	public function setTelefone($telefone): self {
		$this->telefone = $telefone;
		return $this;
	}

    public function getUsuario() {
		return $this->usuario;
	}
	
	/**
	 * @param mixed $nome 
	 * @return self
	 */
	public function setUsuario($usuario): self {
		$this->usuario = $usuario;
		return $this;
	}

    public function getSenha() {
		return $this->senha;
	}
	
	/**
	 * @param mixed $nome 
	 * @return self
	 */
	public function setSenha($senha): self {
		$this->senha = $senha;
		return $this;
	}


	/**
	 * Get the value of nivel_acesso
	 */ 
	public function getNivel_acesso()
	{
		return $this->nivel_acesso;
	}

	/**
	 * Set the value of nivel_acesso
	 *
	 * @return  self
	 */ 
	public function setNivel_acesso($nivel_acesso)
	{
		$this->nivel_acesso = $nivel_acesso;

		return $this;
	}
}