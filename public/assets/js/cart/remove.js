export async function removeFromCart(id, qty = 1) {
  try {
    const response = await fetch("/api/cart/remove.php", {
      method: "POST",
      body: new URLSearchParams({ product_id: id, quantity: qty }),
    });
    const data = await response.json();
    if (!data.success) {
      throw new Error(data.error);
    }
  } catch (err) {
    console.log("Error: ", err);
  }
}
