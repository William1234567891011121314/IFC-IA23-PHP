<?php 
require_once('inc/topo.php');
require_once('classes/produto.php');

session_start();

$cupom10 = 'CUPOM10';
$cupom20 = 'CUPOM20';

if (!isset($_SESSION['produto'])) {
   echo 'novo';
   $_SESSION['produto'] = new Produto();
   $_SESSION['produto']->setNome('Placa de Vídeo Asus Dual NVIDIA GeForce RTX 2070 EVO V2 OC Edition, 8GB, GDDR6');
   $_SESSION['produto']->setPreco(2949.90);
   $_SESSION['produto']->setQuantidade(1);
   $_SESSION['produto']->setPriceModifier(1);
}

// Verifica se o botão de incremento ou decremento foi clicado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['cupom'])) {
         if($_POST['cupom'] === $cupom10){
            $_SESSION['produto']->setPriceModifier(0.9);
         }
         if($_POST['cupom'] === $cupom20){
            $_SESSION['produto']->setPriceModifier(0.8);
         }
   } else if (isset($_POST['incrementar'])) {
      $_SESSION['produto']->setQuantidade($_SESSION['produto']->getQuantidade()+1); // Incrementa o contador
   } else if (isset($_POST['decrementar'])) {
      if($_SESSION['produto']->getQuantidade() > 1) {
         $_SESSION['produto']->setQuantidade($_SESSION['produto']->getQuantidade()-1); // Decrementa o contador
      }
   }
}

if(isset($_REQUEST['deletar']) && $_REQUEST['deletar'] === 'ok'){
    unset($_SESSION['produto']);
}

?>
     
      <div class="main_content">
         <div class="section">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="table-responsive shop_cart_table">
                        <table class="table">
                           <thead>
                              <tr>
                                 <th class="product-thumbnail"></th>
                                 <th class="product-name">Produto</th>
                                 <th class="product-price">Preço</th>
                                 <th class="product-quantity">Quantidade</th>
                                 <th class="product-subtotal">Subtotal</th>
                                 <th class="product-remove">Remove</th>
                              </tr>
                           </thead>
                           <?php
                              if(isset($_SESSION['produto'])){
                                 require('produto/produto.php');
                              }
                           ?>
                        </table>
                         <a href="http://localhost/IFC-IA23-PHP/trabalho/login.php" class="btn btn-fill-out">Concluir compra</a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <div class="medium_divider"></div>
                     <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                     <div class="medium_divider"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
     </body>
</html>