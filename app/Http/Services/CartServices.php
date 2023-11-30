<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;

class CartServices
{
    public function addToCart($product)
    {
        $id = $product['id'];
        $quantity = (int)$product['quantity'];
        $price = (float)$product['price'];
        $name = $product['name'];
        $size = $product['size'];

        if ($quantity <= 0 || $id <= 0) {
            Session::flash('error', 'Số lượng hoặc sản phẩm không hợp lệ');
            return false;
        }

        $cartItems = Session::get('cart');
        if (is_null($cartItems)) {
            $cartItems = [
                $id => [
                    'quantity' => $quantity,
                    'price' => $price,
                    'name' => $name,
                    'size' => $size
                ]
            ];
        } else {
            if (Arr::exists($cartItems, $id)) {
                $cartItems[$id]['quantity'] += $quantity;
            } else {
                $cartItems[$id] = [
                    'quantity' => $quantity,
                    'price' => $price,
                    'name' => $name,
                    'size' => $size
                ];
            }
        }

        Session::put('cart', $cartItems);
        return true;
    }

    public function removeFromCart($productId)
    {
        $cartItems = Session::get('cart');
        if (!is_null($cartItems) && Arr::exists($cartItems, $productId)) {
            unset($cartItems[$productId]);
            Session::put('cart', $cartItems);
            return true;
        }

        return false;
    }

    public function getCartItems()
    {
        return Session::get('cart');
    }

    public function clearCart()
    {
        Session::forget('cart');
    }
}