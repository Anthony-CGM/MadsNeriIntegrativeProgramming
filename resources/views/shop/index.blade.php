{{-- @extends('layouts.base') --}}
@extends('layouts.shop')
@extends('layouts.master')

<br><br>
<div id="cart-container">
    <div id="cart">
   <i class="fa fa-shopping-cart openCloseCart" style="font-size:20px" aria-hidden="true"> <p>SHOPPING CART</p></i> 
      <button id="emptyCart" class="button button5">Delete Cart Items</button>
    </div>
    <span id="supplyCount"></span>
  </div>
  @section('body')

    {{-- <div id="cart-container">
      <div id="cart">
     <i class="fa fa-shopping-cart openCloseCart" style="font-size:20px" aria-hidden="true"> <p>SHOPPING CART</p></i> 
        <button id="emptyCart" class="button button5">Delete Cart Items</button>
      </div>
      <span id="supplyCount"></span>
    </div> --}}

  <div id="shoppingCart">
    <div id="cartsuppliesContainer">
      <h3>Supplies in the cart</h3>
      <i class="fa fa-times-circle-o fa-3x openCloseCart" aria-hidden="true"></i>
      
      <div id="cartSupplies">
      </div>
      <button class="btn btn-primary" id="checkout">Checkout</button>
      <span id="cartTotal"></span>
  	</div>
  </div>

  <nav>
  	<ul>
  		<!-- <li><a href="#">Shopping Cart</a></li> -->
  	</ul>
  </nav>
  
  <div class="container container-fluid" id="supplies"> 
  	
  </div>

@endsection