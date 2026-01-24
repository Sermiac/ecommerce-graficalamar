export async function removeFromCart(id) {
  try {
    const response = await fetch("/api/cart/remove.php", {
      method: "POST",
      body: new URLSearchParams({ product_id: id }),
    });
    const data = await response.json();
    if (data.success) {
      alert("Producto eliminado del carrito");
      window.location.href = "/cart";
    }
    if (!data.success) {
      throw new Error(data.error);
    }
  } catch (err) {
    console.log("Error: ", err);
  }
}
