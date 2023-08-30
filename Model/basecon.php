<?php
require "../config.php";

Class BaseCon{
    public string $responsavel;
    public string $titulo;
    public string $descricao;
    public ?string $imagem;

    
    public function __construct($responsavel, $titulo, $descricao,  $imagem){
        $this->responsavel = $responsavel;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->imagem =  $imagem;
    }

    public function getResponsavel() {
        return $this->responsavel;
      }
      // Método para definir o valor da propriedade responsavel
      public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
      }

      public function getTitulo() {
        return $this->titulo;
      }

      public function setTitulo($titulo){
        $this->titulo = $titulo;
      }

      public function getDescricao(){
        return $this->descricao;
      }

      public function setDescricao($descricao){
        $this->descricao = $descricao;
      }

      public function getImagem(){
        return $this->imagem;
      }

      public function setImagem($imagem){
        $this->imagem = $imagem;
      }


};