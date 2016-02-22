<?php
/**
 * @author jaques
 *
 */
class Endereco{
	
	/*
	 * 
	 */
	private $id;
	private $logradouro;
	private $numero;
	private $bairro;
	private $cidade;
	private $estado;
	private $cep;
	private $complemento;
	private $id_cliente;
	
	
	/*
	 * getters and setters
	 * 
	 */
	public function setId($param) {
		$this->id = $param;
	}
	public function getId() {
		return $this->id;
	}
	
	public function setLogradouro($param) {
		$this->logradouro = $param;
	}
	public function getLogradouro() {
		return $this->logradouro;
	}
	
	public function setNumero($param) {
		$this->numero = $param;
	}
	public function getNumero() {
		return $this->numero;
	}
	
	public function setBairro($param) {
		$this->bairro = $param;
	}
	public function getBairro() {
		return $this->bairro;
	}
	
	public function setCidade($param) {
		$this->cidade = $param;
	}
	public function getCidade() {
		return $this->cidade;
	}
	
	public function setEstado($param) {
		$this->estado = $param;
	}
	public function getEstado() {
		return $this->estado;
	}
	
	public function setCep($param) {
		$this->cep = $param;
	}
	public function getCep() {
		return $this->cep;
	}
	
	public function setComplemento($param) {
		$this->complemento = $param;
	}
	public function getComplemento() {
		return $this->complemento;
	}
	
	public function setIdCliente($param) {
		$this->id_cliente = $param;
	}
	public function getIdCliente() {
		return $this->id_cliente;
	}
	
}