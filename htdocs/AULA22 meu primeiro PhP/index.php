<!DOCTYPE html>
<html>
<head>
    <title>Primeiro php</title>

</head>
<body>
    <h1>Primeiro php</h1>
    <h2>Conteúdo no próprio HTML</h2>   
    <p>Parágrafo no próprio HTML</p>
    <?php 
        echo "<h2> Conteúdo adicinado pelo php </h2>";
    ?>
    <p>O sevidor <strong>executa</strong>o arquivo php para <strong>montar</strong>um HTML.</p>
    <p>O código php não aparece para o cliente.</p>
    <p>O cliente recebe o HTML que foi montado.</p>

    <h2>Valores, variáveis, operações</h2>

    <?php 
    // Comentário de uma linha
    /*Comentário de varias linha 
    OS Comentários php não aparecem para o cliente */
    $a = 5; //variávies em php começam com $
    $abelinha= 10;
    echo "<p> Minha variável: $a </p>";
    // Você pode pegar o valor de uma variável direto dentro da string, usando o $
    
    $a = 10*5; // $a recebe novo valor
    $a += 50;  // $a acrecentando 50
    $a *= 2;   // $a multiplica por 2
    $a ++;     //$a acrescenta 1
    echo "<p>Minha variável ficou: $a </p>";

    $nome = "Rebeca";
    $sobrenome = "Feu";
    // Para colar strings (concatenação) no php usamos .
    echo "<p>Nome Completo: ". $nome ." ". $sobrenome ."</p>";
    ?>

    <h2>Condicional</h2>
    <h3>if</h3>
    <?php 
        //if sozinho
        if ($a > 200) {
            echo "<p$a</p>";
            echo "<p>Minha variável a é maior que 200</p>";
        }
        
        //if else
        if ($a > 300)  {  
            echo "<p>Minha variável a é maior que 300</p>"; 
        }
        else{
            echo "<p>Minha variável a é NÃO que 200</p>";
        }

        // if elseif else
        $escolha = "tesoura";
        
        if ($escolha == "pedra"){
            echo "<p>Pedra</p>";
        }
        elseif ($escolha =="papel"){
            echo "<p>papel</p>";
        }
       else{
        echo "<p>tesoura</p>";
       }
       ?>
       <h3>switch case</h3>
       <?php
       // switch case
       switch ($escolha){
        case "pedra":
             echo "<p>Pedra</p>";
             break;
        case "papel":
             echo "<p>papel</p>";
             break;
             default:
                echo "<p>tesoura</p>";
                break;
       }
      ?>
      <h2>Arrays</h2>
      <?php
        $l = [10, 15, 40, 50];
        $alunos = ["Daiki", "Takeshi","Ryuji", "Kasuki"];
        $alunos[0] = "Lucas"; // Altera o valor na posição 0
        $alunos[] = "Mistica"; //Adiciona um novo valor á lista
        echo "<p>Alunos na posição 0: $alunos[0]</p>";
        echo "<p>Alunos na posição 4: $alunos[4]</p>";
        
        //Array de chaves e valores
        $alunosENotas = array(
            "Daiki" => 8.5,
            "Takeshi" => 9,
            "Ryuji" => 6.5,
            "Kasuki" => 8.5
        );
        $alunosENotas[ "Ryuji" ] += 1.0;
      ?>
    <p>Jeito rápido de imprimir um array inteiro</p>
    <?php
        echo "<pre>"; // Tag <pre> preserva espaçamento e quebra de linha e coloca fonte monoespaçada
        var_dump($alunosENotas); // var_dump() imprime a sua variável no site, com algumas informações
        echo "</pre>";
     ?>
    <h2>Repetição</h2>
    <h3>For</h3>
    <p>Número de 1 a 10</p>
    <ul>
        <?php
        for($i=1; $i<=10; $i++){
            echo "<li>". $i ."</li>";
        }
         ?>
    </ul>
    <p>Número pares de 1 a 50</p>
        <ul>
        <?php
        for($i=2; $i<=50; $i+=2){
            echo "<li>". $i ."</li>";
        }
         ?>
         </ul>

         <p>Usando foreach para varrer uma lista</p>
         <p>lista de alunos:
            <?php
                foreach($alunos as $elementoDaVez){
                   echo $elementoDaVez.",";
                }
            ?>
         </p>
         <p>Lista de alunos e notas:</p>
         <ul>
         <?php
            // Varremdo a lista  $alunosENotas, que é uma lista de chaves e valores
            foreach($alunosENotas as $chaves => $valor){
                echo "<li>";
                echo $chaves . ": " . $valor; //Nome: nota
                echo "</li>";
            }
         ?>
         </ul>
         <p>Lista de alunos e notas com a situação:</p>
         <ul>
         <?php
            foreach($alunosENotas as $aluno => $nota){
                echo "<li>";
                echo $aluno . " : " . $nota ; //Nome : nota
                if ($nota >= 7){
                    echo " - Aprovado!";
                }
                elseif ($nota >= 5){
                    echo " - Recuperação";
                }
                else {
                    echo " - Reprovado";
                }
                echo "</li>";
            }
         ?>
         </ul>
         <h2>Funções</h2>
         <?php
         //Declarando uma função
         function imprimeComTag( $texto,$tag = "p"){
            echo "<$tag>$texto</$tag>";
         }
         //Chamando sua função
         imprimeComTag("Aqui eu chamei minha função","p");
         imprimeComTag("Agora usamos o valor padão");

         //Declarando uma função que retorna um valor
         function situacao($nota){
            if ($nota >= 7){
                return "Aprovado";
            }
            elseif ($nota >= 5){
                return "Recuperação";
            }
            else {
                return " Reprovado";
            }
         }
         echo situacao(7);
          ?>
</body>
</html>