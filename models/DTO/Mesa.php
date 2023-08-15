<?php

class Mesa
{

	//Atributos class
	private $id;
	private $numero;
	private $aberta
	;



	//Constructor
	public function __construct($si, $nu, $id = null)
	{
		$this->aberta
			= $si;
		$this->numero = $nu;
		$this->id = $id;
	}


	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of id
	 *
	 * @return  self
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}



	/**
	 * @return mixed
	 */
	public function getAberta()
	{
		return $this->aberta
		;
	}

	/**
	* @param mixed $aberta
	
	* @return self
	*/
	public function setAberta
	(
		$aberta
	): self {
		$this->aberta
			= $aberta
		;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * @param mixed $numero 
	 * @return self
	 */
	public function setNumero($numero): self
	{
		$this->numero = $numero;
		return $this;
	}
}