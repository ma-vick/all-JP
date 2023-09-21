<?php 

// cabeçalhos obrigatórios

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'conexao.php';

$dados = $conexao->query("SELECT * FROM products");

if(($dados) AND ($dados->rowCount() != 0)){
    while($row = $dados->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $list_products["products"][$id] = [
            'id' => $id,
            'name_product' => $name_product,
            'category' => $category,
            'price' => $price,
            'description_product' => $description_product
        ];
    }

    http_response_code(200);

    echo json_encode($list_products);
}

?>