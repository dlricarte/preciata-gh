<?php

/**
 * @author jaques
 *
 */
class Produto{
	
	 /*
	  * atributos
	  */
	 private $id;
	 private $codigo;
	 private $nome;
	 private $descricao;
	 private $urlImagem;
	 
	 
	 /*
	  * GETTERS AND SETTERS
	  */
	 public function setId($param) {
	 	$this->id = $param;
	 }
	 public function getId() {
	 	return $this->id;
	 }
	 
	 public function setCodigo($param) {
	 	$this->codigo = $param;
	 }
	 public function getCodigo() {
	 	return $this->codigo;
	 }
	 
	 public function setNome($param) {
	 	$this->nome = $param;
	 }
	 public function getNome(){
	 	return $this->nome;
	 }
	 
	 public function setDescricao($param) {
	 	$this->descricao = $param;
	 }
	 public function getDescricao(){
	 	return $this->descricao;
	 }
	 
	 public function setUrlImagem($param) {
	 	$this->urlImagem = $param;
	 }
	 public function getUrlImagem(){
	 	return $this->urlImagem;
	 }
}