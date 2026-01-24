export async function getCart() {
  try {
    const res = await fetch("/api/cart/get.php");

    if (res.status === 204) {
      return null;
    }

    if (!res.ok) {
      throw new Error(`Error ${res.status}`);
    }

    const cart = await res.json();
    return cart;
  } catch (err) {
    console.error(err);
    return null;
  }
}
