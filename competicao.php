<?php

   $paises = [
    'Brasil' => [
        'medalhas' => [
            "ouro" => 3,
            "prata" => 5,
            "bronze" => 3,
            ],
        ],
    'Costa Rica' => [
        'medalhas' => [
            "ouro" => 5,
            "prata" => 4,
            "bronze" => 4,
            ],
        ],
    'Estados Unidos' => [
        'medalhas' => [
            "ouro" => 4,
            "prata" => 5,
            "bronze" => 5,
          ],
        ],
    'Trindade e tabogo' => [
        'medalhas' => [
            "ouro" => 4,
            "prata" => 5,
            "bronze" => 4,
        ],
    ],
];

    usort($paises, function($paises1, $paises2) {
        if ($paises1['medalhas']['ouro'] > $paises2['medalhas']['ouro']) {
            return -1;
            echo "olá mundo";
        }
        if ($paises1['medalhas']['ouro'] < $paises2['medalhas']['ouro']) {
            return 1;
            echo "adeus mundo";
        }
        return $paises1['medalhas']['ouro'] - $paises2['medalhas']['ouro'];
    });
    
    usort($paises, function ($paises1, $paises2) {
        $medalhas1 = $paises1['medalhas'];
        $medalhas2 = $paises2['medalhas'];
    
        return $medalhas2['ouro'] - $medalhas1['ouro'] !== 0
            ? $medalhas2['ouro'] - $medalhas1['ouro']
            : ($medalhas2['prata'] - $medalhas1['prata'] !== 0
                ? $medalhas2['prata'] - $medalhas1['prata'] 
                : $medalhas2['bronze'] - $medalhas1['bronze']);
    });

    $numeroDeMedalhas = array_reduce($paises, function ($medalhasAcumuladas, $itemAtual) {
        $medalhasDoPais = array_reduce($itemAtual['medalhas'], function ($medalhasAcumuladasDoPaisAtual, $medalhasDoPaisAtual) {
            return $medalhasAcumuladasDoPaisAtual + $medalhasDoPaisAtual;
        }, 0);
    
        return $medalhasAcumuladas + $medalhasDoPais;
    }, 0);
    

    
    function converteNome ($nome){
        $nome = ucwords(strtoupper($nome));
        return $nome;
    }

?>

<h1>Total de Países participantes: <?php echo count($paises);   ?>  </h1>
<h1>Total de medalhas entregues: <?php echo $numeroDeMedalhas; ?> </h1>

    
<table cellspacing="0">
    <?php foreach($paises as $pais => $exibeTodos): ?>
        <tr>
            <th><h3><?php echo $pais; ?></h3></th>
        </tr>
    
        <tr>  
            <th>Medalha</th>
            <th>Quantidade</th>
        </tr>
            <?php foreach($exibeTodos as $exibe => $medalhas): ?>
                <?php foreach($medalhas as $medalha => $quantidade): ?>

            <tr>       
                <td><?php echo converteNome($medalha); ?></td>
                <td><?php echo $quantidade; ?></td>
            </tr>    

            <?php endforeach ?>
         <?php endforeach ?>
        <?php endforeach ?>
</table>




