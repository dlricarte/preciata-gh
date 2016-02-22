<?php

/**
 * @author jaques
 *
 */
class Login{
	
	private $id;
	private $usuario;
	private $senha;
	
	/*
	 * getters and setters
	 */	
	
	public function setId($param){
		$this->id = $param;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setUsuario($param) {
		$this->usuario = $param;
	}
	public function getUsuario() {
		return $this->usuario;
	}
	
	public function setSenha($param) {
		$this->senha = $param;
	}
	public function getSenha() {
		return $this->senha;
	}
}