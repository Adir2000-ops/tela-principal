<?php

class Li {

    private $sClass;
    private $sConteudo;
    
    public function __construct($sClass,$sConteudo) {
        $this->sClass = $sClass;
        $this->sConteudo = $sConteudo;
    }

    public function addElement(...$sAtributo) {
        $this->aLista = array_merge($this->aLista, $sAtributo);
    }

    public function __toString() {
        return '<li class="'.$this->sClass.'">'.$this->sConteudo."</li>\n";
    }
}