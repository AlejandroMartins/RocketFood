<?php

class ItemVenda
{

    //Atributos class
    private $id;
    private $id_produto;
	private $id_venda;
    private $quantidade;
	private $preco;
    private $valorTotal;
	private $descricao;
    

    //Constructor
    public function __construct($idp, $idv, $qtd, $prc,$valtot,$desc,$id = null){
        $this->id_produto = $idp;
		$this->id_venda = $idv;
        $this->quantidade = $qtd;
		$this->preco = $prc;
        $this->valorTotal = $valtot;
		$this->descricao = $desc;
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
	public function getValorTotal() {
		return $this->valorTotal;
	}
	
	/**
	 * @param mixed $valorTotal 
	 * @return self
	 */
	public function setValorTotal($valorTotal): self {
		$this->valorTotal = $valorTotal;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getQuantidade() {
		return $this->quantidade;
	}
	
	/**
	 * @param mixed $quantidade 
	 * @return self
	 */
	public function setQuantidade($quantidade): self {
		$this->quantidade = $quantidade;
		return $this;
	}

    /**
     * Get the value of id_produto
     */ 
    public function getId_produto()
    {
        return $this->id_produto;
    }

    /**
     * Set the value of id_produto
     *
     * @return  self
     */ 
    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

        return $this;
    }

	/**
	 * Get the value of preco
	 */ 
	public function getPreco()
	{
		return $this->preco;
	}

	/**
	 * Set the value of preco
	 *
	 * @return  self
	 */ 
	public function setPreco($preco)
	{
		$this->preco = $preco;

		return $this;
	}

	/**
	 * Get the value of id_venda
	 */ 
	public function getId_venda()
	{
		return $this->id_venda;
	}

	/**
	 * Set the value of id_venda
	 *
	 * @return  self
	 */ 
	public function setId_venda($id_venda)
	{
		$this->id_venda = $id_venda;

		return $this;
	}

	/**
	 * Get the value of descricao
	 */ 
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * Set the value of descricao
	 *
	 * @return  self
	 */ 
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;

		return $this;
	}
}

?>