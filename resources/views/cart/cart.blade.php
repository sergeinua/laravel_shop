<div id="shop-cart">
	@if(Session::has('cart') && (Session::get('cart')->total_quan > 0))
		<span id="shop-cart-currency" name="руб" course="1" decimals="0" dsep="." tsep="&nbsp;"></span>
		<span class="cart-isnotempty">
			<a href="/korzina">
				КОРЗИНА:<br>
				<small>
					<span class="mini-cart-count" data-count="">товаров: {!! Session::get('cart')->total_quan !!}</span><br/>
					<span class="cart-price" data-price="">сумма: {!! Session::get('cart')->total_price !!}&nbsp;руб</span>
				</small>
			</a>
		</span>
	@else
		<span class="cart-isempty">КОРЗИНА:<br>
			<small>(пусто)</small>
		</span>
	@endif
</div>