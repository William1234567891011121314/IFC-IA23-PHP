<?php 
require_once('inc/topo.php');
require_once('/classes/produto.php');

session_start();
error_reporting(0);


$cupom10 = 'CUPOM10';
$cupom20 = 'CUPOM20';

if (!isset($_SESSION['carrinho'])) {
   $_SESSION['produto'] = new Produto();
   $_SESSION['produto']->setNome('Placa de Vídeo Asus Dual NVIDIA GeForce RTX 2070 EVO V2 OC Edition, 8GB, GDDR6');
   $_SESSION['produto']->setPreco(2949.90);
   $_SESSION['produto']->setQuantidade(1);
}

// Verifica se o botão de incremento ou decremento foi clicado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['cupom']) && $_SESSION['cupom_uso'] === 0) {
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
                           <tbody>
                              <tr>
                                 <td class="product-thumbnail"><a href=""><img src="http://localhost/ifc/trabalho/img/produto.jpg" alt="Placa de Vídeo Asus Dual NVIDIA GeForce RTX 2070 EVO V2 OC Edition, 8GB, GDDR6"></a></td>
                                 <td class="product-name" data-title="Product"><a href=""><?=$_SESSION['product-name']?></a></td>
                                 <td class="product-price" data-title="Price">R$ <?= number_format($_SESSION['produto']->getPreco(),2,',','.')?></td>
                                 <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                       <form method="post" action="" class="text-center mt-4">
                                            <button type="submit" name="incrementar" class="btn btn-success">+</button>
                                            <input type="text" disabled="" name="qtde_pedido_item" value="<?=$_SESSION['qtde_pedido_item']?>" title="Qty" class="qty" size="4">
                                            <button type="submit" name="decrementar" class="btn btn-danger">-</button>
                                        </form>
                                    </div>
                                 </td>
                                 <td class="product-subtotal" data-title="Total">R$ <?= number_format(($_SESSION['produto']->getPreco()*$_SESSION['produto']->getQuantidade()*$_SESSION['produto']->getPriceModifier()),2,',','.')?></td>
                                 <td class="product-remove qtde" tipo="remove" id_produto="5" data-title="Remove"><a href="?deletar=ok">X</a></td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="6" class="px-0">
                                    <div class="row no-gutters align-items-center">
                                       <div class="col-lg-12 col-md-12 mb-12 mb-md-12">
                                          <div class="coupon field_form input-group">
                                             <form method="post" action="" class="text-center mt-4">
                                                <input type="text" name="cupom" value="" class="form-control form-control-sm" placeholder="Código do cupom">
                                                <div class="input-group-append">
                                                   <button class="btn btn-fill-out btn-sm" type="submit">Aplicar cupom</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                         <a href="http://localhost/ifc/trabalho/login.php" class="btn btn-fill-out">Concluir compra</a>
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