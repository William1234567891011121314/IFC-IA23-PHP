<?php require_once('inc/topo.php'); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header('Location: /ifc/trabalho');
}

?>
    <style>
        form {
            display: flex;
            justify-content: center;
        }
        form>div {
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
    </style>
    <form action="" method="post">
        <div>
            <h1>Parabéns, você concluiu a sua compra!</h1>
            <button type="submit">Voltar</button>
        </div>
    </form>
</body>