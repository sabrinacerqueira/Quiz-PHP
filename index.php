<?php
$quiz = [
   "Geografia" => [
    //Pergunta 1
    [
        'pergunta' => 'Qual a capital do Brasil?',
        'opcoes' => ['São Paulo', 'Rio de Janeiro', 'Brasília', 'Salvador', 'Fortaleza'],
        'resposta_correta' => 'Brasília'
    ],
    //Pergunta 2
    [
        'pergunta' => 'Qual é a capital do estado da Bahia?',
        'opcoes' => [ 'Porto Alegre','Salvador','Fortaleza','Goiânia','Natal'],
        'resposta_correta' => 'Salvador'
    ],
    //Pergunta 3
    [
        'pergunta' => 'Qual a capital do estado de São Paulo?',
        'opcoes' => ['Campinas','São Paulo','Santos','Ribeirão Preto','Sorocaba'],
        'resposta_correta' => 'São Paulo'
    ],
    //Pergunta 4
    [
        'pergunta' => 'Qual a capital do Rio de Janeiro?',
        'opcoes' => ['Niterói','Campos dos Goytacazes','Duque de Caxias','Rio de Janeiro','Angra dos Reis'],
        'resposta_correta' => 'Rio de Janeiro'
    ],
    //Pergunta 5
    [
        'pergunta' => 'Qual a capital do Amazonas?',
        'opcoes' => ['Belém','Porto Velho','Manaus','Macapá','Boa Vista'],
        'resposta_correta' => 'Manaus'
    ]
],
 
   "Matematica" => [
     //Pergunta 1
    [
        'pergunta' => 'Qual é o resultado de 8 + 6?',
        'opcoes' => ['12', '14', '16', '10', '18'],
        'resposta_correta' => '14'
    ],
    //Pergunta 2
    [
        'pergunta' => 'Qual é o valor de 9 × 7?',
        'opcoes' => ['56', '63', '90', '72', '81'],
        'resposta_correta' => '63'
    ],
    //Pergunta 3
    [
        'pergunta' => 'Se eu tenho 30 moedas e dou 12 para um amigo, com quantos eu fico?',
        'opcoes' => ['20', '18', '22', '1', '15'],
        'resposta_correta' => '18'
    ],
    //Pergunta 4
    [
        'pergunta' => 'Qual é o valor de 25 ÷ 5?',
        'opcoes' => ['3', '5', '7', '10', '8'],
        'resposta_correta' => '18'
    ],
    //Pergunta 5
    [
        'pergunta' => 'Qual número falta na sequência: 2, 4, 6, ___, 10?',
        'opcoes' => ['7', '8', '9', '11', '12'],
        'resposta_correta' => '8'
    ]
],
 "Portugues" => [
    //Pergunta 1
    [
        'pergunta' => 'Qual é a forma correta de escrever a palavra no plural?',
        'opcoes' => ['Pão', 'Pães', 'Pãos', 'Pans', 'Paes'],
        'resposta_correta' => 'Pães'
    ],
    //Pergunta 2
    [
        'pergunta' => 'Qual é o coletivo de "peixes"?',
        'opcoes' => ['Manada', 'Bando', 'Rebanho', 'Cardume', 'Alcateia'],
        'resposta_correta' => 'Cardume'
    ],
    //Pergunta 3
    [
        'pergunta' => 'Qual é o sinônimo de "inteligente"?',
        'opcoes' => ['Esperto', 'Comum', 'Alto', 'Belo', 'Veloz'],
        'resposta_correta' => 'Esperto'
    ],
    //Pergunta 4
    [
        'pergunta' => 'Qual é o aumentativo de "casa"?',
        'opcoes' => ['Casado', 'Casinha', 'Casota', 'Casalhão', 'Casarão'],
        'resposta_correta' => 'Casarão'
    ],
        //Pergunta 5
    [
        'pergunta' => 'Qual é o diminutivo de "livro"?',
        'opcoes' => ['Livrote', 'Livrozinho', 'Livrinho', 'Livroinho', 'Livrinhozinho'],
        'resposta_correta' => 'Livrinho'
    ]
  ]
];
?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 20px;
}
 
h2 {
    text-align: center;
    color: #333;
}
 
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    max-width: 600px;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
 
.pergunta-box {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 6px;
    background-color: #fafafa;
}
 
.pergunta-box p {
    font-weight: bold;
    margin-bottom: 10px;
}
 
label {
    display: block;
    margin: 5px 0;
}
 
input[type="submit"] {
    background-color: #5599ffff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 15px;
}
 
input[type="submit"]:hover {
    background-color: #5599ffff;
}
 
.resultado {
    text-align: center;
    font-weight: bold;
    color: #333;
    margin-top: 15px;
}
</style>
 
<form method="post">
    <label>Escolha um tema:</label>
    <select name="tema">
        <?php foreach($quiz as $tema => $perguntas) {
            echo "<option value='$tema'>$tema</option>";
        } ?>
    </select>
    <input type="submit" name="selecionar" value="Selecionar Tema">
</form>
 
<?php
if(isset($_POST['selecionar'])) {
    $temaSelecionado = $_POST['tema'];
    echo "<form method='post'>";
    echo "<input type='hidden' name='tema' value='$temaSelecionado'>";
   
    switch($temaSelecionado) {
        case "Geografia":
        case "Matematica":
        case "Portugues":
            foreach($quiz[$temaSelecionado] as $i => $pergunta) {
                echo "<div class='pergunta-box'>";
                echo "<p>".$pergunta['pergunta']."</p>";
 
                foreach($pergunta['opcoes'] as $opcao) {
                    echo "<label><input type='radio' name='resposta[$i]' value='$opcao'> $opcao</label><br>";
                }
                echo "</div>";
            }
            echo "<input type='submit' name='enviar' value='Enviar Respostas'>";
        break;
    }
    echo "</form>";
}
 
if(isset($_POST['enviar'])) {
    $respostas = $_POST['resposta'] ?? [];
    $temaSelecionado = $_POST['tema'];
    $acertos = 0;
 
    foreach($quiz[$temaSelecionado] as $i => $pergunta) {
        if(isset($respostas[$i]) && $respostas[$i] == $pergunta['resposta_correta']) {
            $acertos++;
        }
    }
    echo "<div class='pergunta-box'>";  
    $nota = ($acertos / count($quiz[$temaSelecionado])) * 10;
    echo "<p>Você acertou $acertos de ".count($quiz[$temaSelecionado])." perguntas.</p>";
    echo "<p>Sua nota: $nota / 10</p>";
 
   
    if($nota >= 8){ echo "<p>Parabéns! Seu desempenho esta acima da média.</p>";
    }
    elseif($nota >= 5) {echo "<p>Bom! Seu desempenho esta na média.</p>";
    }
    else{ echo "<p>Seu desempenho esta abaixo da média.</p>";
    }
    echo "</div>";
 
    echo "<form method='post'><input type='submit' value='Jogar Novamente'></form>";
}
?>
