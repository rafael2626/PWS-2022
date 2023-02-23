<?php
require_once './vendor/autoload.php';
use Carbon\Carbon;

class Plano
{
    public function calculaPlano($divida, $numPrest)
    {
        $divida = $divida * 100;
        $original = $divida;
        $matrizPrestacoes = array();
        $valorPrestacao = (int)($divida/$numPrest);

        $dt = Carbon::now();

        for($i = 1; $i <= $numPrest; $i++)
        {
            $dt = $dt->copy()->addMonth(1);

            $divida -= $valorPrestacao;

            if($i == $numPrest && ($divida != 0))
            {
                $valorPrestacao = $original - ($valorPrestacao * ($i-1));
                $divida = 0;
            }

            $matrizPrestacoes[$i] = array(
                'data' => $dt,
                'valor' => $valorPrestacao,
                'divida' => $divida
            );
        }

        return $matrizPrestacoes;
    }
}


