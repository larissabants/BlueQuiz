<?php

include 'functions.js';
include 'concad.php';

    $retorno['questoes']=array();
    $questoes=$pdo->prepare("SELECT *FROM perguntas WHERE id_perguntas");
    $questoes->execute([$id]);

    while($enunciado_pergunta=$questoes->fetchObject()){

        $retorno['questoes'][]= [
            'id'=>$enunciado_pergunta->id_perguntas,
            'enunciado_pergunta'=>$enunciado_pergunta->$enunciado_pergunta
        ];

        $opcoes=$pdo->prepare("SELECT * FROM alternativas WHERE fk_id_pergunta = ?");
        $opcoes->execute([$enunciado_alternativa->id_perguntas]);

        $retorno['questoes'][]['opcoes']= array();
        while($enunciado_alternativa=$opcoes->fetchObject()){
            $retorno['questoes'[]['opcoes'][]=[
                    'id_alternativa'=>$enunciado_alternativa->id,
                    'enunciado_alternativa'=>$enunciado_alternativa->enunciado_alternativa
            ];
        }


    } 
    die(json_encode($retorno));
?>