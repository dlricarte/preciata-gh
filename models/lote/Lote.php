<?php
/**
 * @author jaques
 *
 */
class Lote{

	/*
	 * atributos
	 */
	private $id;
	private $dataRegistro;
	private $dataFechamento;
	private $clienteId;
	private $status = "Aberto";
	private $valor;
	private $quantidadeItens;
	
	
	/*
	 * getters and setters
	 */
	public function setId($param) {
		$this->id = $param;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setDataRegistro($param) {
		$this->dataRegistro = $param;
	}
	public function getDataRegistro(){
		return $this->dataRegistro;
	}
	
	public function setDataFechamento($param) {
		$this->dataFechamento = $param;
	}
	public function getDataFechamento(){
		return $this->dataFechamento;
	}
	
	public function setClienteId($param) {
		$this->clienteId = $param;
	}
	public function getClienteId(){
		return $this->clienteId;
	}
	
	public function setStatus($param) {
		$this->status = $param;
	}
	public function getStatus(){
		return $this->status;
	}
	
	public function setValor($param) {
		$this->valor = $param;
	}
	public function getValor(){
		return $this->valor;
	}
	
	public function setQuantidadeItens($param) {
		$this->quantidadeItens = $param;
	}
	public function getQuantidadeItens(){
		return $this->quantidadeItens;
	}
}