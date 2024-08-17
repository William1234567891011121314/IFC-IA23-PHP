<?php require_once('inc/topo.php');?>
<?php
ini_set('max_execution_time', 60);
session_start();
$produtos = json_decode(file_get_contents('produtos.json'), true);
if(!isset($_SESSION['produto'])){
   $_SESSION['produto'] = $produtos;
   $_SESSION['desconto'] = 1;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
   for($id = 0; $id < count($_SESSION['produto']); $id++){
      if(isset($_POST["aumentarquantidade-$id"])){
         $_SESSION['produto'][$id]['quantidade']++;
      } else if(isset($_POST["diminuirquantidade-$id"]) && $_SESSION['produto'][$id]['quantidade'] > 1){
         $_SESSION['produto'][$id]['quantidade']--;
      } else if(isset($_POST["deletar-$id"])){
         unset($_SESSION['produto'][$id]);
         $_SESSION['produto'] = array_values($_SESSION['produto']);
      }
   }
   if(isset($_POST['cupom']) && $_POST['cupom'] == "manuel_gomes") {
      $_SESSION['desconto'] = 0.001;
   }

   if(isset($_POST['reset'])){
      $_SESSION['produto'] = $produtos;
      $_SESSION['desconto'] = 1;
   }
}
function atualizarPreco() {
   for($id = 0; $id < count($_SESSION['produto']); $id++){
      $_SESSION['produto'][$id]['precototal'] = $_SESSION['produto'][$id]['preco'] * $_SESSION['produto'][$id]['quantidade'] * $_SESSION['desconto'];
   }
}

for($id = 0; $id < count($_SESSION['produto']); $id++){
   $_SESSION['produto'][$id]['precototal'] = $_SESSION['produto'][$id]['preco'] * $_SESSION['produto'][$id]['quantidade'] * $_SESSION['desconto'];
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
                              <?php
                                 for($id = 0; $id < count($_SESSION['produto']); $id++){
                                    include 'model/productModel.php';
                                 }
                              ?>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="6" class="px-0">
                                    <div class="row no-gutters align-items-center">
                                       <div class="col-lg-12 col-md-12 mb-12 mb-md-12">
                                          <div class="coupon field_form input-group">
                                             <form action="" method="post">
                                                <input type="text" value="" class="form-control form-control-sm" placeholder="Código do cupom" name="cupom">
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
                        <form method="post" action="">
                           <button type="submit" class="btn btn-fill-out btn-sm" name="reset">Resetar carrinho</button>
                        </form>
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