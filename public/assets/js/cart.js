import { getCart } from "./cart/get.js";
import { removeFromCart } from "./cart/remove.js";

async function main() {
  try {
    const cart = await getCart();
    if (!cart || cart.items.length === 0) {
      alert("Empieza a agregar productos al carrito!");
      return;
    }
    const container = document.getElementById("cart_items");

    cart.items.forEach((p) => {
      const card = document.createElement("div");
      card.className = "card-container fadeInUp-animation";

      card.innerHTML = `
                  <div class="product-card cart">
                    <img src="/assets/img/${p.image}" alt="${p.name}">
                    <p>${p.name}</p>
                    <p>Cantidad: ${p.quantity}</p>
                    <p>Total: $${p.subtotal}</p>
                    <button class="removeBtn card-button" data-id="${p.product_id}">Quitar del carrito</a>
                  </div>
              `;

      container.appendChild(card);
      observer.observe(card);
    });
  } catch (err) {
    console.error(err);
  }
}

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.1 },
);

main();

const logoutBtn = document.getElementById("logoutBtn");
const buyBtn = document.getElementById("buyBtn");

document.addEventListener("click", (e) => {
  if (e.target.closest(".removeBtn")) {
    try {
      const btn = e.target.closest(".removeBtn");
      removeFromCart(btn.dataset.id);
    } catch (err) {
      console.log("Error: ", err);
    }
  }
});

if (logoutBtn) {
  logoutBtn.addEventListener("click", async () => {
    try {
      const res = await fetch("/api/logout.php", { method: "POST" });

      const data = await res.json();

      if (data.success === true) {
        window.location.href = "/";
      } else {
        console.error("Error al cerrar sesión:", data);
      }
    } catch (err) {
      console.error("Error de conexión:", err);
    }
  });
}

if (buyBtn) {
  buyBtn.addEventListener("click", async () => {
    try {
      const res = await fetch("/api/checkout/whatsapp.php");
      const data = await res.json();

      if (data.success) {
        window.open(data.url, "_blank");
      }
    } catch (err) {
      console.log("Error: ", err);
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".fadeInUp-animation").forEach((el) => {
    observer.observe(el);
  });
});
