<?php require_once('inc/topo.php');

session_start();
//echo '<pre>';
//print_r($_SESSION['users']);

if (!isset($_SESSION['users'])) {
   $_SESSION['users'] = array();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $alreadyExist = false;
   $equalPassphrase = false;
   $equalEmail = false;
   for($i = 0; $i < count($_SESSION['users']); $i++){
      if($_SESSION['users'][$i]['email'] == $_POST['email_cliente'] || $_SESSION['users'][$i]['senha'] == $_POST['cliente_senha']){
         if($_SESSION['users'][$i]['email'] == $_POST['email_cliente']){
            $equalEmail = true;
         }
         if($_SESSION['users'][$i]['senha'] == $_POST['cliente_senha']){
            $equalPassphrase = true;
         }
         $alreadyExist = true;
         break;
      }
   }
   array_push($_SESSION['users'], array(
      'nome'=> $_POST['nome_cliente'],
      'sobrenome' => $_POST['sobrenome_cliente'],
      'cpf' => $_POST['cpf_cliente'],
      'telefone' => $_POST['fone_cliente'],
      'whatsapp' => $_POST['whats_cliente'],
      'email' => $_POST['email_cliente'],
      'senha' => $_POST['cliente_senha']
      )
   );
}

?>
      <div class="main_content">
         <div class="login_register_wrap section">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-xl-6 col-md-10">
                     <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                           <form action="" method="post" name="form" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>Nome</label>
                                 <input type="text" required="" name="nome_cliente" id="nome_cliente" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                 <label>Sobrenome</label>
                                 <input type="text" required="" name="sobrenome_cliente" id="sobrenome_cliente" class="form-control" value="">
                              </div>
                              <div class="form-group">
                                 <label>CPF</label>
                                 <input type="text" name="cpf_cliente" id="cpf_cliente" class="form-control cpf" value="" maxlength="14">
                              </div>
                              <div class="form-group">
                                 <label>Telefone</label>
                                 <input type="text" name="fone_cliente" id="fone_cliente" class="form-control fone" value="" maxlength="14">
                              </div>
                              <div class="form-group">
                                 <label>Whats</label>
                                 <input type="text" name="whats_cliente" id="whats_cliente" class="form-control fone" value="" maxlength="14">
                              </div>
                              <div class="form-group">
                                 <label>E-mail</label>
                                 <input type="email" required="" name="email_cliente" id="email_cliente" class="form-control" value="">
                                 <?php
                                    if($equalEmail){
                                       echo "O usuário ", $_POST['nome_cliente'], " já possui este email";
                                    }
                                 ?>
                              </div>
                              <div class="form-group">
                                 <label>Senha</label>
                                 <input type="password" required="" name="cliente_senha" id="cliente_senha" class="form-control" value="">
                                 <?php
                                    if($equalPassphrase){
                                       echo "O usuário ", $_POST['nome_cliente'], " já possui esta senha";
                                    }
                                 ?>
                              </div>
                              <div class="login_footer form-group">
                                 <div class="chek-form">
                                    <div class="custome-checkbox">
                                       <label><span>Ao se cadastrar você concorda com os <a href="#" style="font-weight: bold;">Termos e Condições</a></span></label>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <button type="submit" class="btn btn-fill-out btn-block" name="register">Cadastre-se</button>
                              </div>
                           </form>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </body>
</html>