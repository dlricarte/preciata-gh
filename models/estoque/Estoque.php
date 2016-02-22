<?php

/**
 * @author jaques
 *
 */
class Estoque{
	
	/*
	 * 
	 */
	private $id;
	private $quantidade;
	private $idProduto;
	
	
	/*
	 * getters and setters
	 */	
	public function setId($param) {
		$this->id = $param;
	}
	public function getId() {
		return $this->id;
	}
		
	public function setQuantidade($param) {
		$this->quantidade = $param;
	}
	public function getQuantidade() {
		return $this->quantidade;
	}
	
	public function setIdProduto($param) {
		$this->idProduto = $param;
	}
	public function getIdProduto() {
		return $this->idProduto;
	}
	
}