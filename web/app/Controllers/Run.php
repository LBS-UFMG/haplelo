<?php

namespace App\Controllers;

class Run extends BaseController
{
    private function gravar($texto){
        // essa função grava os dados em um arquivo
        $arquivo = "./input/input.inp";
        $fp = fopen($arquivo, "w");
        fwrite($fp, $texto);
        fclose($fp);
    }

    public function index(){
        
        // recebe os dados em uma variável
        $dados = $this->request->getPost();

        // grava dados no arquivo "input.inp"
        Run::gravar($dados['input']);

        $phase = '../app/ThirdParty/phase.2.1.1.linux/PHASE';  // linux
        $phase = '../app/ThirdParty/PHASE2.1.1/PHASE';  // macos

        $comando = 'nohup '.$phase.' -MS -f1 -S$RANDOM "./input/input.inp" ./output/acre 400000 1000 50000 &';

        echo($comando);

        $comando2 = "sed --expression='/BEGIN LIST_SUMMARY/,/END LIST_SUMMARY/{ /LIST_SUMMARY/d; p }' \
           --quiet /resultado/acre | column -t | tr -s ' ' | tr ' ' , > ./output/halelos.csv";

        $comando3 = "sed --expression='/BEGIN BESTPAIRS_SUMMARY/,/END BESTPAIRS_SUMMARY/{ /BESTPAIRS_SUMMARY/d; p }' \
           --quiet /resultado/acre | tr ':(),' ' ' | sort | column -t | tr -s ' ' | tr ' ' , > ./output/pacientes.csv";

        return view('running');
    }

}
