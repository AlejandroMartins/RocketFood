<?php

class Venda
{

    //Atributos class
    private $id;
    private $dataVenda;
    private $valorTotal;
	private $id_mesa;
	private $aberta;
    

    //Constructor
    public function __construct($f, $m, $idm, $id = null){
        $this->dataVenda = $m;
        $this->valorTotal = $f;
		$this->id_mesa = $idm;  
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
	public function getdataVenda() {
		return $this->dataVenda;
	}
	
	/**
	 * @param mixed $dataVenda 
	 * @return self
	 */
	public function setdataVenda($dataVenda): self {
		$this->dataVenda = $dataVenda;
		return $this;
	}



	/**
	 * Get the value of id_mesa
	 */ 
	public function getId_mesa()
	{
		return $this->id_mesa;
	}

	/**
	 * Set the value of id_mesa
	 *
	 * @return  self
	 */ 
	public function setId_mesa($id_mesa)
	{
		$this->id_mesa = $id_mesa;

		return $this;
	}
}

?>