<?php
require_once "conecta.php";

/* Lógica/Funções para o CRUD de Fabricantes */

// listarFabricantes: usada pela página fabricantes/visualizar.php
function listarFabricantes(PDO $conexao):array {
    $sql = "SELECT * FROM fabricantes ORDER BY nome";

    try{
        
    /* Preparando o comando SQL ANTES de executar no servidor
    e guardando em memória (variável consulta ou query) */
    $consulta = $conexao->prepare($sql);
    
    /* Executando o comando no banco de dados */
    $consulta->execute();
    
    /* Busca/Retorna todos os dados provenientes da execução da consulta
    e os transforma em um array associativo */
    return $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro: ".$erro->getMessage());
    }
}

// inserirFabricante: Usada pela página fabricantes/inserir.php
function inserirFabricante(PDO $conexao, string $nomeDoFabricante):void { //void: Indica que não tem retorno
    // named parameter (parâmetro nomeado)
    // Usamos este recurso do PDO para 'reservar' um espaço seguro em memória 
    //para colocação do dado. NUNCA passe de forma direta valores para comando SQL.
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

    try{
        $consulta = $conexao->prepare($sql);

        /*bindValue() -> permite vincular o valor do parâmetro á
        consulta que será executada. É necessário indicar qual é o
        parâmetro (:nome), de onde vem o valor ($nomeDoFabricante)
        e de que tipo ele é (PDO:PARAM_STR) */ 
        $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);

        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

// listarUmFabricante: usada pela página fabricante/atualizar.php
function listarUmFabricante(PDO $conexao, int $idFabricante):array{
    $sql = "SELECT * FROM fabricantes WHERE id = :id";

    try{
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
    
        $consulta->execute();
        /*Usamos o fetch para garantir o retorno de um único array
        associoativo com o resultado */
        return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar fabricantes: ".$erro->getMessage());
    }
}

// atualizarFabricante: usada oela página fabricante/atualizar.php
function atualizarFabricante(PDO $conexao, int $idFabricante):array{
    $sql = "SELECT * FROM fabricantes WHERE id = :id";

    try{
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
    
        $consulta->execute();
        /*Usamos o fetch para garantir o retorno de um único array
        associoativo com o resultado */
        return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar fabricantes: ".$erro->getMessage());
    }
}
