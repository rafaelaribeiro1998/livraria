<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria Online</title>
    <!-- Importe o Bootstrap antes de qualquer outro estilo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="historia.css">
</head>

<body>
    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-family: 'Georgia', sans-serif;">A Historia Dos Livros</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre.html">Sobre</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Gêneros
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Autoajuda</a></li>
                            <hr class="dropdown-divider" />
                            <li><a class="dropdown-item" href="#">Ficção Científica</a></li>
                            <hr class="dropdown-divider" />
                            <li><a class="dropdown-item" href="#">Fantasia</a></li>
                            <hr class="dropdown-divider" />
                            <li><a class="dropdown-item" href="#">Romance</a></li>
                            <hr class="dropdown-divider" />
                            <li><a class="dropdown-item" href="#">Suspense</a></li>
                            <hr class="dropdown-divider" />
                            <li><a class="dropdown-item" href="#">Terror</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Formulário de pesquisa -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Procurar" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Procurar</button>
                </form>

                <div class="ml-auto">
                    <a href="#" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#cartModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cart4" viewBox="0 0 16 16">
                            <path
                                d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg>
                    </a>
                </div>

                <div class="dropdown">
                    <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Acesse Aqui
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="Login e Cadastro.php">Cadastre-se</a></li>
                      
                    </ul>
                </div>
            </div>
        </div>
    </nav>

  
<!-- Modal de Carrinho -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <form id="checkoutForm" method="post" action="checkout.php">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="cartModalLabel">Carrinho de Compras</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="carrinhoConteudo">
          <!-- Conteúdo do Carrinho de Compras aqui -->
          <input type="hidden" id="carrinhoInput" name="carrinho" value="">
          <div>
            <table class="table">
              <thead>
                <tr>
                  <th>Nome do Livro</th>
                  <th>Preço</th>
                  <th>Quantidade</th>
                </tr>
              </thead>
              <tbody id="corpoTabela">
                <!-- Linhas da tabela geradas dinamicamente pelo JavaScript -->
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2">Total da Compra</td>
                  <td id="totalCompra">R$ 0,00</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-dark" onclick="finalizarCompra()">Finalizar Compra</button>
        </div>
      </div>
    </div>
  </form>
</div>



<!--Carrosel-->


<div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/Box Artifícios das Trevas Acompanha brindes.jpg" class="d-block w-20" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/Kit Estilhaça-me A série completa.jpg" class="d-block w-20" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/Box O povo do ar  acompanha brindes.jpg" class="d-block w-20" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/Box Azul Harry Potter.jpg" class="d-block w-20" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br>


    <!-- Mostruário de Produtos -->
    <div class="container mt-4">
        <h2 class="mb-4" style="text-align: center;">Livros em Destaque</h2>
        <br>
    
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="img/A paciente silenciosa.png" class="card-img-top img-fluid mx-auto" alt="A Paciente Silenciosa">
                    <div class="card-body">
                        <h5 class="card-title">A Paciente Silenciosa</h5>
                        <br>
                        <p class="card-text"><strong>Preço: R$ 35,99</strong></p>
                        <button class="btn btn-outline-dark" onclick="adicionarAoCarrinho('A paciente silenciosa', 35.99)">
                            Adicionar ao Carrinho
                        </button>
                        
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="img/A Rebelde do Deserto.jpg" class="card-img-top img-fluid mx-auto" alt="A Rebelde do Deserto">
                    <div class="card-body">
                        <h5 class="card-title">A Rebelde do Deserto</h5>
                        <br>
                        <p class="card-text"><strong>Preço: R$ 29,99</strong></p></p>
                        <button class="btn btn-outline-dark" onclick="adicionarAoCarrinho('A Rebelde do Deserto', 29.99)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="img/Box-harry.jpg" class="card-img-top img-fluid mx-auto" alt="Box azul Harry Potter">
                    <div class="card-body">
                        <h5 class="card-title">Box azul Harry Potter</h5>
                        <br>
                        <p class="card-text"><strong>Preço: R$ 250,00</strong></p></p>
                        <button class="btn btn-outline-dark" onclick="adicionarAoCarrinho('Box Azul Harry Potter', 250.00)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="img/Lady Killers  Assassinas em Séri.jpg" class="card-img-top img-fluid mx-auto" alt="Lady Killers  Assassinas em série">
                    <div class="card-body">
                        <h5 class="card-title">Lady Killers: Assassinas em Série</h5>
                        <br>
                        <p class="card-text"><strong>Preço: R$ 45,99</strong></p></p>
                        <button class="btn btn-outline-dark" onclick="adicionarAoCarrinho('Lady Killers: Assassinas em Série', 45.99)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="img/Mentes Sombrias 2.png" class="card-img-top img-fluid mx-auto" alt="Mentes Sombrias">
                    <div class="card-body">
                        <h5 class="card-title">Mentes Sombrias</h5>
                        <br>
                        <p class="card-text"><strong>Preço: R$ 20,00</strong></p></p>
                        <button class="btn btn-outline-dark" onclick="adicionarAoCarrinho('Mentes Sombrias', 20.00)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="img/Personalidades Perigosas 1.png" class="card-img-top img-fluid mx-auto" alt="Personalidades Perigosas">
                    <div class="card-body">
                        <h5 class="card-title">Personalidades Perigosas</h5>
                        <br>
                        <p class="card-text"><strong>Preço: R$ 59,99</strong></p></p>
                        <button class="btn btn-outline-dark" onclick="adicionarAoCarrinho('Personalidades Perigosas', 59.99)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="img/Serial Killers. Anatomia do Mal.png" class="card-img-top img-fluid mx-auto" alt="Serial Killers. Anatomia do Mal">
                    <div class="card-body">
                        <h5 class="card-title">Serial Killers. Anatomia do Mal</h5>
                        <br>
                        <p class="card-text"><strong>Preço: R$ 29,99</strong></p></p>
                        <button class="btn btn-outline-dark" onclick="adicionarAoCarrinho('Serial Killers. Anatomia do Mal', 39.99)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            </div>
    
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="img/Textos para tocar cicatrizes 1.jpg" class="card-img-top img-fluid mx-auto" alt="Textos para tocar cicatrizes 1">
                    <div class="card-body">
                        <h5 class="card-title">Textos para tocar cicatrizes</h5>
                        <br>
                        <p class="card-text"><strong>Preço: R$ 25,99</strong></p></p>
                        <button class="btn btn-outline-dark" onclick="adicionarAoCarrinho('Textos para tocar cicatrizes 1.', 25.99)">
                            Adicionar ao Carrinho
                        </button>
                    </div>
                </div>
            </div>
    
           
    

        <!-- Adicione mais produtos conforme necessário -->
    </div>
</div>

<!-- Script para adicionar ao carrinho e mostrar alerta -->
<script>
  var carrinho = [];

  function calcularTotal() {
    return carrinho.reduce((total, item) => total + item.preco * item.quantidade, 0);
  }

  function adicionarAoCarrinho(nomeLivro, precoLivro) {
    const livroExistente = carrinho.find(item => item.nome === nomeLivro);

    if (livroExistente) {
      livroExistente.quantidade++;
    } else {
      carrinho.push({ nome: nomeLivro, preco: precoLivro, quantidade: 1 });
    }

    atualizarConteudoCarrinho();
    atualizarCampoCarrinhoInput();

    const mensagem = `${nomeLivro} adicionado ao carrinho!`;
    alert(mensagem);
  }

  function atualizarConteudoCarrinho() {
    const corpoTabela = document.getElementById('corpoTabela');
    corpoTabela.innerHTML = '';

    if (carrinho.length === 0) {
      corpoTabela.innerHTML = '<tr><td colspan="3">Carrinho vazio.</td></tr>';
    } else {
      carrinho.forEach(item => {
        const linha = corpoTabela.insertRow();
        const colunaNome = linha.insertCell(0);
        const colunaPreco = linha.insertCell(1);
        const colunaQuantidade = linha.insertCell(2);
        colunaNome.textContent = item.nome;
        colunaPreco.textContent = `R$ ${item.preco.toFixed(2)}`;
        colunaQuantidade.textContent = item.quantidade;
      });

      const totalCompra = document.getElementById('totalCompra');
      totalCompra.textContent = `R$ ${calcularTotal().toFixed(2)}`;
    }
  }

  function atualizarCampoCarrinhoInput() {
    document.getElementById('carrinhoInput').value = JSON.stringify(carrinho);
  }

  // Função para finalizar a compra (chamada ao enviar o formulário)
function finalizarCompra() {
    // Atualiza o campo oculto com todos os campos do formulário e do carrinho
    document.getElementById('carrinhoInput').value = JSON.stringify(carrinho);
    document.getElementById('checkoutForm').submit();
}



// Função chamada ao clicar em "Continuar Compra" no modal
function continuarCompra() {
  // Aqui você pode adicionar lógica adicional se necessário
  // Redirecionando para a página de pagamento
  window.location.href = 'http://localhost/Historia/Historia/Checkout.php';
}


</script>

    

    
    <!-- Seu conteúdo continua aqui... -->

    <!-- Adicione os scripts do Bootstrap no final do corpo do documento -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Rodapé -->
    <footer>
        <div class="container">
            <footer class="py-5">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>Informações</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Política de Privacidade</a></li>
                            <li class="nav-item mb-2"><a href="https://drive.google.com/file/d/1tqN5RdHqSaeAozeOH-Gms_3EMqLdgXc4/view?usp=sharing" class="nav-link p-0 text-body-secondary">Política de Segurança</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Política de Troca</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Prazos de Entrega e Procedimentos</a></li>
                        </ul>
                    </div>

                    

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Comunique-se Conosco</h5>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Endereço de Email</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Endereço de Email">
                                <button class="btn btn-dark" type="button">Escreva-se</button>
                            </div>
                        </form>
                        <br>
                        <h5><a href="https://www.google.com/maps/place/Senac+Cidade+Alta/@-5.7826882,-35.2090354,17z/data=!3m1!4b1!4m6!3m5!1s0x7b3001383ab2847:0x912a2e126db35b70!8m2!3d-5.7826935!4d-35.2064605!16s%2Fg%2F1tf364xz?entry=ttu" target="_blank">Nosso Endereço</a></h5>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2023 A Historia Dos Livros, Inc. Todos os direitos reservados.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-body-emphasis" href="https://twitter.com/HistoriaDosLiv"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#twitter" /></svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#instagram" /></svg></a></li>
                        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#facebook" /></svg></a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </footer>

    <!-- Ícones Bootstrap -->
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="bootstrap" viewBox="0 0 118 94">
          <title>Bootstrap</title>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>
        <symbol id="facebook" viewBox="0 0 16 16">
          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
        </symbol>
        <symbol id="instagram" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
        </symbol>
        <symbol id="twitter" viewBox="0 0 16 16">
          <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
        </symbol>
      </svg>


</body>

</html>