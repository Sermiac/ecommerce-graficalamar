export async function addToCart(id) {
  const response = await fetch("/api/cart/add.php", {
    method: "POST",
    body: new URLSearchParams({ product_id: id }),
  });
  const data = await response.json();
  if (data.success) {
    alert("Producto agregado al carrito");
  }
}
