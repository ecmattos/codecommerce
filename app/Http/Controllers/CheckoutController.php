<?php

namespace CodeCommerce\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use CodeCommerce\Events\CheckoutEvent;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use CodeCommerce\Cart;
use CodeCommerce\Category;

//PagSeguro
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    } 

    public function place(Order $orderModel, OrderItem $ordemItem, CheckoutService $checkoutService)
    {
    	if(!Session::has('cart'))
    	{
    		return "FALSE";
    	}

    	$cart = Session::get('cart');

        $categories = Category::all();

    	if ($cart->getTotal() > 0)
    	{
    	    $checkout = $checkoutService->createCheckoutBuilder(); //pagseguro

            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal()]); //inclui na tabela

    		foreach ($cart->all() as $k=>$item) 
    		{
    			$checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, ".",""), $item['qtd']));//pagseguro
                
                $order->items()->create(['product_id'=>$k, 'price'=>$item['price'], 'qtd'=>$item['qtd']]); //inclui na tabela
    		}
    		
    		$cart->clear();

    		event(new CheckoutEvent(Auth::user(), $order));

            $response = $checkoutService->checkout($checkout->getCheckout());//pagseguro
            return redirect($response->getRedirectionUrl());//pagseguro
            
            #return view('store.checkout', compact('cart', 'order', 'categories'));
        }
        else
        {
            return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
        }
    }
}
