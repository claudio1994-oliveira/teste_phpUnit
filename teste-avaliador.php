<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require "vendor/autoload.php";

// Arrange - Given / Preparamos o cenário do teste

$leilao = new Leilao('Sonic Corre Rápido');

$maria = new Usuario('Maria');
$aquiles = new Usuario('Aquiles');

$leilao->recebeLance(new Lance($maria, 200));
$leilao->recebeLance(new Lance($aquiles, 2000));

$leiloeiro = new Avaliador();

// Act - When / Executamos o código a ser testado
$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

// Assert - Then / Verificamos se a saída é a esperada
$valorEsperado = 2500;

if ($maiorValor == $valorEsperado) {
    echo "TESTE OK";
} else {
    echo "TESTE FALHOU";
}