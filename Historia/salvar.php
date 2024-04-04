<?php
// Conexão com o banco de dados (substitua pelos seus próprios detalhes de conexão)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "livraria";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se a variável POST 'carrinho' não está vazia
if (!empty($_POST['carrinho'])) {
    // Inicializa a array $carrinho
    $carrinho = [];

    // Decodifica a string JSON e atribui à array $novosItens
    $novosItens = json_decode($_POST['carrinho'], true);

    // Verifica se a array decodificada é uma array válida
    if (is_array($novosItens)) {
        // Itera sobre os novos itens e adiciona diretamente à array $carrinho
        foreach ($novosItens as $item) {
            // Certifique-se de que os índices existem antes de acessá-los
            if (isset($item['nome'], $item['preco'], $item['quantidade'])) {
                $nome_do_Livro = $item['nome'];
                $preco = $item['preco'];
                $quantidade = $item['quantidade'];
                $total = $preco * $quantidade;

                // Usando prepared statements para evitar injeção de SQL
                $stmt = $conn->prepare("INSERT INTO Carrinho (Nome_do_Livro, Preco, Quantidade, Total) VALUES (?, ?, ?, ?)");
                // Atualize os tipos de dados nos bind_param para corresponder aos seus dados reais
                $stmt->bind_param("sidi", $nome_do_Livro, $preco, $quantidade, $total);

                if ($stmt->execute()) {
                    echo "Registro do carrinho inserido com sucesso.<br>";
                } else {
                    echo "Erro ao inserir registro no carrinho: " . $stmt->error . "<br>";
                }

                $stmt->close();

                echo "Nome do Livro: $nome_do_Livro, Preço: $preco, Quantidade: $quantidade, Total: $total<br>";
            } else {
                // Lida com o caso em que um índice necessário está ausente
                echo "Erro: Índices ausentes no item do carrinho.<br>";
            }
        }
    } else {
        // A array decodificada não é válida, faça algo se necessário
        echo "Erro: A array decodificada não é válida.";
    }
} else {
    // A variável POST 'carrinho' está vazia, faça algo se necessário
    echo "Erro: A variável POST 'carrinho' está vazia.";
}

// Obter dados do formulário do checkout (substitua pelos seus próprios métodos de obtenção de dados)
$nomeCliente = $_POST['nomeCompleto']; // Substitua pelo campo real do formulário
$emailCliente = $_POST['email']; // Substitua pelo campo real do formulário
$endereco = $_POST['endereco']; // Substitua pelo campo real do formulário
$cidade = $_POST['cidade']; // Substitua pelo campo real do formulário
$cep = $_POST['zipCode']; // Substitua pelo campo real do formulário
$metodoPagamento = $_POST['paymentMethod']; // Substitua pelo campo real do formulário

// Inserir dados na tabela Checkout
$sqlCheckout = "INSERT INTO Checkout (Nome, Email, Endereco, Cidade, CEP, Metodo_de_Pagamento) 
                VALUES (?, ?, ?, ?, ?, ?)";

$stmtCheckout = $conn->prepare($sqlCheckout);
$stmtCheckout->bind_param("ssssss", $nomeCliente, $emailCliente, $endereco, $cidade, $cep, $metodoPagamento);

if ($stmtCheckout->execute()) {
    echo "Registro na tabela Checkout inserido com sucesso.<br>";
} else {
    echo "Erro ao inserir registro na tabela Checkout: " . $stmtCheckout->error . "<br>";
}

$stmtCheckout->close();

// Calcular o total a pagar
$totalPagar = 0;
foreach ($carrinho as $item) {
    if (isset($item['preco'], $item['quantidade'])) {
        $totalPagar += $item['preco'] * $item['quantidade'];
    } else {
        // Lida com o caso em que um índice necessário está ausente
        echo "Erro: Índices ausentes no item do carrinho.<br>";
    }
}

// Inserir dados na tabela TotalCompra
$sqlTotalCompra = "INSERT INTO TotalCompra (Nome_do_Cliente, Total_a_Pagar) VALUES (?, ?)";

$stmtTotalCompra = $conn->prepare($sqlTotalCompra);
$stmtTotalCompra->bind_param("sd", $nomeCliente, $totalPagar);

if ($stmtTotalCompra->execute()) {
    echo "Registro na tabela TotalCompra inserido com sucesso.<br>";
} else {
    echo "Erro ao inserir registro na tabela TotalCompra: " . $stmtTotalCompra->error . "<br>";
}

$stmtTotalCompra->close();

// Fechar conexão
$conn->close();

?>
