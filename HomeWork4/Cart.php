<?php


namespace Shopp;
include 'autoloader.php';
class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    // TODO Generate getters and setters of properties



    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        //TODO Implement method
        $lCartItem = new CartItem($product,1);
        $lCurrentCartItems = $this->getItems();
        foreach($lCurrentCartItems as $iCartItem) {
            if($iCartItem->getProduct()->getTitle() == $product->getTitle()) {
                $iCartItem->setQuantity($iCartItem->getQuantity() + 1);
                return $iCartItem;
            }
        }
        array_push($lCurrentCartItems, $lCartItem);
        $this->setItems($lCurrentCartItems);
        return $lCartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        //TODO Implement method
        $lCartItems = $this->getItems();
        foreach($lCartItems as $index=>$iCartItem) {
            if($iCartItem->getProduct()->getTitle() == $product->getTitle()) {
                array_splice($lCartItems,$index);
            }
        }
        $this->setItems($lCartItems);
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        //TODO Implement method
        $totalQuantity = 0;
        $lCartItems = $this->getItems();
        foreach($lCartItems as $iCartItem) {
            $totalQuantity += $iCartItem->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        //TODO Implement method
        $totalSum = 0;
        $lCartItems = $this->getItems();
        foreach($lCartItems as $iCartItem) {
            $totalSum += $iCartItem->getProduct()->getPrice() * $iCartItem->getQuantity();
        }
        return $totalSum;
    }
}