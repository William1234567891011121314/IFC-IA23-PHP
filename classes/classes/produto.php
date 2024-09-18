<?php
    class Produto {
        private $nome;
        private $preco;
        private $quantidade;
        private $priceModifier;
        public function setNome($nome){
            $this->$nome = $nome;
        }

        public function setPreco($preco) {
            $this->$preco = $preco;
        }

        public function setQuantidade($quantidade) {
            $this->$quantidade = $quantidade;
        }

        public function setPriceModifier($priceModifier){
            $this->priceModifier = $priceModifier;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }

        public function getPriceModifier() {
            return $this->priceModifier;
        }
    }
?>