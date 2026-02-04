<?php

namespace App\Livewire\Website\Cart;

use App\Models\Cart;
use App\Models\CartItem;
use Livewire\Attributes\On;
use Livewire\Component;

class AddToCartProductSection extends Component
{
    public $qtyAddedToCart = 1;
    public $product;
    public $variantId;

    public function mount($product)
    {
        $this->product = $product;
        if (!$this->product->isSimple())
            $this->variantId = $this->product->variants()->first()->id;
        else
            $this->variantId = null;
    }

    public function decrementQuantity()
    {
        if ($this->qtyAddedToCart > 1) {
            $this->qtyAddedToCart--;
        }
    }

    public function incrementQuantity()
    {
        $this->qtyAddedToCart++;
    }


    #[On('change-variantId')]
    public function changeVariantId($variantId)
    {
        $this->variantId = $variantId;
    }

    public function addToCart()
    {
        if (!$this->checkUserAuth()) return redirect()->route('website.login');

        $cart = $this->getOrCreateCart();

        if ($this->product->isSimple()) {
            $this->updateOrCreateCartForProductSimple($cart);
            $this->dispatch('update-cart');
            return;
        } else {
            $this->updateOrCreateCartForProductVariant($cart);
            $this->dispatch('update-cart');
            return;
        }
        $this->dispatch('cart-error', __('website.not_found'));

    }

    protected function checkUserAuth()
    {
        if (!auth('web')->check()) {
            return false;
        }
        return true;
    }

    protected function getOrCreateCart()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => auth()->user()->id,
        ]);
        if (!$cart) {
            $this->dispatch('error_404', __('website.not_found'));
            return;
        }
        return $cart;
    }

    protected function updateOrCreateCartForProductSimple($cart)
    {
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $this->product->id)
            ->whereNull('product_variant_id')
            ->first();
        if ($cartItem)
            return $this->updateItemCartForProductSimple($cartItem, $this->product->getPriceAfterDiscount());
        else
            return $this->createItemCartForProductSimple($cartItem, $cart, $this->product->getPriceAfterDiscount());

    }

    protected function updateItemCartForProductSimple($cartItem, $price)
    {
        $cartItem->update([
            'quantity' => $cartItem->quantity + $this->qtyAddedToCart,
            'total_price' => $cartItem->total_price + ($price * $this->qtyAddedToCart),
        ]);
        $this->dispatch('cart-updated', __('website.add_to_cart'));
    }

    protected function createItemCartForProductSimple($cartItem, $cart, $price)
    {

        $cartItem = $cart->items()->create([
            'product_id' => $this->product->id,
            'quantity' => $this->qtyAddedToCart,
            'product_variant_id' => null,
            'price' => $price,
            'total_price' => $this->product->price * $this->qtyAddedToCart,
        ]);
        $this->dispatch('cart-added', __('website.add_to_cart'));
    }

    protected function updateOrCreateCartForProductVariant($cart)
    {
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_variant_id', $this->variantId)
            ->where('product_id', $this->product->id)
            ->first();
        $variants = $this->product->variants()->whereId($this->variantId)->first();

        if ($cartItem)
            return $this->updateItemCartForProductVariant($cartItem, $this->product->getPriceDiscountForVariants());
        else
            return $this->createItemCartForProductVariant($cartItem,$variants, $this->product->getPriceDiscountForVariants(), $cart);
    }

    protected function updateItemCartForProductVariant($cartItem, $variantPrice)
    {
        $cartItem->update([
            'quantity' => $cartItem->quantity + $this->qtyAddedToCart,
            'total_price' => $cartItem->total_price + ($variantPrice->price * $this->qtyAddedToCart),
        ]);
        $this->dispatch('cart-updated', __('website.add_to_cart'));
    }

    protected function createItemCartForProductVariant($cartItem, $variants,$variantPrice, $cart)
    {
        $attributes = [];
        foreach ($variants->variantAttributes as $attribute) {
            $attributes [$attribute->attributeValue->attribute->name] = $attribute->attributeValue->value;
        }
        foreach ($variantPrice as $price){
            if($price->id == $this->variantId){
                $cart->items()->create([
                    'product_id' => $this->product->id,
                    'quantity' => $this->qtyAddedToCart,
                    'product_variant_id' => $this->variantId,
                    'price' => $price->price,
                    'total_price' => $price->price * $this->qtyAddedToCart,
                    'attributes' => $attributes
                ]);
            }
        }
        $this->dispatch('cart-added', __('website.add_to_cart'));
    }


    public function render()
    {
        return view('livewire.website.cart.add-to-cart-product-section');
    }
}
