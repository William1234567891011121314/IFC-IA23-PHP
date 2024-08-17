<tr>    
    <form id="id-<?php echo $id ?>" method="post">
        <td class="product-thumbnail"><a href=""><img src="http://localhost/ifc/trabalho/img/<?php echo $_SESSION['produto'][$id]['imgAddress'] ?>" alt="<?php echo $_SESSION['produto'][$id]['nome'] ?>"></a></td>
        <td class="product-name" data-title="Product"><a href=""><?php echo $_SESSION['produto'][$id]['nome']?></a></td>
        <td class="product-price" data-title="Price">R$ <?php echo $_SESSION['produto'][$id]['preco'] ?></td>
        <td class="product-quantity" data-title="Quantity">
            <div class="quantity">
                <input id="qtdmenos" type="submit" value="-" class="qtde" tipo="menos" name="diminuirquantidade-<?php echo $id ?>">
                <input id="qtd" type="text" disabled="" name="qtde_pedido_item" value="<?php echo $_SESSION['produto'][$id]['quantidade'] ?>" title="Qty" class="qty" size="4">
                <input id="qtdmais" type="submit" value="+" class="qtde" tipo="mais" name="aumentarquantidade-<?php echo $id ?>">
            </div>
        </td>
        <td class="product-subtotal" data-title="Total">R$ <?php echo round($_SESSION['produto'][$id]['precototal'], 2) ?></td>
        <td class="product-remove qtde" tipo="remove" id_produto="5" data-title="Remove">
            <button name="deletar-<?php echo $id ?>" type="submit">X</button>
        </td>
    </form>
</tr>