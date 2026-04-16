export async function addToCart(id, qty = 1) {
  const response = await fetch("/api/cart/add.php", {
    method: "POST",
    body: new URLSearchParams({ product_id: id, quantity: qty }),
  });
  const data = await response.json();
  if (data.success) {
    alert("Producto agregado al carrito");
  }
}
