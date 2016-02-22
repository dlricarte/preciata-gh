<?php


/**
 * @author jaques 20/01/2016
 *
 */
class Cliente{
	private $id;
	private $nome;
	private $fone;
	private $email;
	private $instagran;
	private $indicacao;
	private $tipo;
	private $whatsapp;
	private $aniversario;
	private $facebook;

	/*
	 * getters and setters
	 */	
	
	function setId($param) {
		$this->id = $param;
	}
	function getId() {
		return $this->id;
	}
	
	function setNome($param) {
		$this->nome = $param;
	}	
	function getNome() {
		return $this->nome;
	}
		
	function setFone($param) {
		$this->fone = $param;
	}
	function getFone() {
		return $this->fone;
	}
	
	function setEmail($param) {
		$this->email = $param;
	}
	function getEmail() {
		return $this->email;
	}
	
	function setInstagran($param) {
		$this->instagran = $param;
	}
	function getInstagran() {
		return $this->instagran;
	}
	
	function setIndicacao($param) {
		$this->indicacao = $param;
	}
	function getIndicacao() {
		return $this->indicacao;
	}
	
	function setTipo($param) {
		$this->tipo = $param;
	}
	function getTipo() {
		return $this->tipo;
	}
	
	function setWhatsapp($param) {
		$this->whatsapp = $param;
	}
	function getWhatsapp() {
		return $this->whatsapp;
	}
	
	function setAniversario($param) {
		$this->aniversario = $param;
	}
	function getAniversario() {
		return $this->aniversario;
	}
	
	function setFacebook($param) {
		$this->facebook = $param;
	}
	function getFacebook() {
		return $this->facebook;
	}
	
}