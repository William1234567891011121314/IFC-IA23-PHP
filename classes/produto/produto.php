<tbody>
    <tr>
        <td class="product-thumbnail"><a href=""><img src="http://localhost/IFC-IA23-PHP/trabalho/img/produto.jpg" alt="Placa de Vídeo Asus Dual NVIDIA GeForce RTX 2070 EVO V2 OC Edition, 8GB, GDDR6"></a></td>
        <td class="product-name" data-title="Product"><a href=""><?=$_SESSION['produto']->getNome()?></a></td>
        <td class="product-price" data-title="Price">R$ <?= number_format($_SESSION['produto']->getPreco(),2,',','.')?></td>
        <td class="product-quantity" data-title="Quantity">
        <div class="quantity">
            <form method="post" action="" class="text-center mt-4">
                <button type="submit" name="incrementar" class="btn btn-success">+</button>
                <input type="text" disabled="" name="qtde_pedido_item" value="<?=$_SESSION['produto']->getQuantidade()?>" title="Qty" class="qty" size="4">
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