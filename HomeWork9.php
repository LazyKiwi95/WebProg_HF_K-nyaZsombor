<?php
if (isset($_POST['OK']))
{
    $userid = $_POST['id'];

    $url = "https://fakestoreapi.com/carts/user/" . $_POST['id'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);

    $carts = json_decode($result, true);

    $products_url = 'https://fakestoreapi.com/products';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $products_url);
    $result = curl_exec($ch);
    curl_close($ch);

    $products = json_decode($result, true);

    $total_price = 0;

    foreach ($carts as $cart)
    {
        foreach ($cart['products'] as $product)
        {
            $product_id = $product['productId'];
            $quantity = $product['quantity'];

            foreach ($products as $item) {
                if ($item['id'] == $product_id)
                {
                    $price = $item['price'];
                    $total_price += $price * $quantity;
                    break;
                }
            }
        }
    }
    echo "A kosarak összértéke: $total_price";
}


?>

<form action="HomeWork9.php" method="post">
    <label>ID
    <input type="number" name="id">
    </label>
    <input type="submit" value="OK" name="OK">
</form>
