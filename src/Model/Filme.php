<?php

namespace APP\Model;

class Filme
{
    private string $nome;
    private int $ano;
    private int $quantidade;
    private string $secao;
    private string $faixa_etaria;    

    public function __construct(
        string $nome,
        int $ano,
        int $quantidade,
        string $secao,
        string $faixa_etaria,
        int $id=0
    )
    {        
        $this->nome = $nome;
        $this->ano = $ano;
        $this->quantidade = $quantidade;
        $this->secao = $secao;
        $this->faixa_etaria = $faixa_etaria;
        $this->id = $id;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }
}