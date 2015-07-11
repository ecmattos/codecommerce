Olá, {{ $user->name }} !
<br>
Informamos o recebimento do seu pedido de nr #{{ $order->id }} contendo os produtos abaixo:

<table class="table">
    <thead>
		<tr>
        	<th>Código</th>
            <th>Produto</th>
            <th>Valor Unitário</th>
            <th>Qte</th>
            <th>Valor item</th>
        </tr>
    </thead>
    <tbody>
    
       	<tr>
       		<td colspan="4">Total do pedido:</td>
       		<td>R$ {{ number_format($order->total, 2,",",".") }}</td>
        </tr>
    </tbody>
</table>