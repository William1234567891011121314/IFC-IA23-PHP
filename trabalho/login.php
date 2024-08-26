<?php require_once('inc/topo.php');?>
<?php
   session_start();

   if (!isset($_SESSION['users'])) {
      $_SESSION['users'] = array();
   }
   
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $correctEmail = false;
      $correctPasswd = false;
      for($i = 0; $i < count($_SESSION['users']); $i++){
         if($_POST['email_cliente'] == $_SESSION['users'][$i]['email']){
            $correctEmail = true;
         }
         if($_POST['cliente_senha'] == $_SESSION['users'][$i]['senha']){
            $correctPasswd = true;
         }
      }
      if($correctEmail && $correctPasswd){
         header('Location: /ifc/trabalho/finalizar.php');
      }
   }
?>
      <div class="main_content">
         <div class="login_register_wrap section">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-xl-6 col-md-10">
                     <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                           <div class="heading_s1">
                              <h3>Login</h3>
                           </div>
                           <form action="" method="post" name="form" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>E-mail</label>
                                 <input type="text" required="" class="form-control" name="email_cliente">
                                 <?php
                                    if(!$correctEmail){
                                       echo "Email incorreto!";
                                    }
                                 ?>
                              </div>
                              <div class="form-group">
                                 <label>Senha</label>
                                 <input class="form-control" required="" type="password" name="cliente_senha">
                                 <?php
                                 if(!$correctPasswd){
                                    echo 'Senha incorreta!';
                                 }
                                 ?>
                              </div>
                              <div class="form-group">
                                 <button type="submit" class="btn btn-fill-out btn-block" name="login">Acessar</button>
                              </div>
                           </form>
                           <div class="form-note text-center">Não tem conta? <a href="http://localhost/ifc/trabalho/cadastro.php">Cadastre-se</a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
       </div>
    </body>
</html>