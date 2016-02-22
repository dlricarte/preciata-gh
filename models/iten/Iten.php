<?php
/**
 * @author jaques
 *
 */
class Iten{
	
	/*
	 * atributos
	 */
	private $idProduto;
	private $idLote;
	private $idIten;
	private $quantidade;
	
	
	/*
	 * getters and setters
	 */
	public function setIdProduto($param) {
		$this->idProduto = $param;
	}
	public function getIdProduto() {
		return $this->idProduto;
	}
	
	public function setIdLote($param) {
		$this->idLote = $param;
	}
	public function getIdLote() {
		return $this->idLote;
	}
	
	public function setIdItem($param) {
		$this->idItem = $param;
	}
	public function getIdItem() {
		return $this->idItem;
	}
	
	public function setQuantidade($param) {
		$this->quantidade = $param;
	}
	public function getQuantidade() {
		return $this->quantidade;
	}
}