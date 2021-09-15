<?php
    function limpar($texto, $espaco=false, $ponto=false, $virgula=false, $arroba=false) {

        if($espaco==true){
            $texto = str_replace(' ', '-ESPACO-', $texto);
        }
        
        if($ponto==true){
            $texto = str_replace('.', '-PONTO-', $texto);
        }

        if($virgula==true){
            
            $texto = str_replace(',', '-VIRGULA-', $texto);
        }

        if($arroba==true){
            $texto = str_replace('@', '-ARROBA-', $texto);
        }
            
        $texto = preg_replace('/[^A-Za-z0-9\-]/', '', $texto);
        $texto = str_replace('-ESPACO-', ' ', $texto);
        $texto = str_replace('-PONTO-', '.', $texto);
        $texto = str_replace('-VIRGULA-', ',', $texto);
        $texto = str_replace('-ARROBA-', '@', $texto);
        return $texto;
    }
    //include 'sql_injection.php';
?>