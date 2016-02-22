<?php
/**
 * @author jaques
 *
 */
class Preco{

		/*
		 * atributos
		 */
		private $id;
		private $compra;
		private $venda;
		private $revenda;
		
		/*
		 * getters and setters
		 */
		public function setId($param) {
			$this->id = $param;
		}
		public function getId() {
			return $this->id;
		}
		
		public function setCompra($param) {
			$this->compra = $param;
		}
		public function getCompra() {
			return $this->compra;
		}
		
		public function setVenda($param) {
			$this->venda = $param;
		}
		public function getVenda() {
			return $this->venda;
		}
		
		public function setReVenda($param) {
			$this->revenda = $param;
		}
		public function getReVenda() {
			return $this->revenda;
		}
		
}