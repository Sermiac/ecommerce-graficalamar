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
                  <a href="/product-details?id=${p.product_id}" class="card-link">
                    <img src="/assets/img/${p.image}" alt="${p.name}">
                  </a>
                    <p>${p.name}</p>
                    <p>Cantidad: ${p.quantity} <button class="decreaseBtn" data-id="${p.product_id}" style="border: none; background: none; cursor: pointer;">▼</button></p>
                    <p>Total: $${Number(p.subtotal).toLocaleString("es-CO")}</p>

                  <button class="removeBtn card-button" data-id="${p.product_id}" data-qty="${p.quantity}">Quitar del carrito</button>
                  </div>
              `;

      container.appendChild(card);
      observer.observe(card);
    });

    const totalRes = await fetch("/api/checkout/whatsapp.php");
    const totalData = await totalRes.json();

    if (totalData.success) {
      const totalContainer = document.getElementById("cart_total");
      totalContainer.innerHTML = `
        <div class="total-info">
          <h3>Total del pedido: $${Number(totalData.total).toLocaleString("es-CO")}</h3>
        </div>
      `;

      const buyBtn = document.getElementById("buyBtn");
      if (buyBtn) {
        buyBtn.setAttribute("data-url", totalData.url);
      }
    }
  } catch (err) {
    console.error(err);
  }
}

async function initWhatsapp() {
  const whatsappBtn = document.getElementById("whatsapp");
  if (!whatsappBtn) return;

  const res = await fetch("/api/contact.php");
  const data = await res.json();

  whatsappBtn.href = data.url;
}

initWhatsapp();

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

document.addEventListener("click", (e) => {
  const decreaseBtn = e.target.closest(".decreaseBtn");
  if (decreaseBtn) {
    e.preventDefault();
    try {
      removeFromCart(decreaseBtn.dataset.id, 1);
      window.location.href = "/cart";
    } catch (err) {
      console.log("Error decreasing quantity: ", err);
    }
    return;
  }

  const btn = e.target.closest(".removeBtn");
  if (!btn) return;

  try {
    const qty = btn.dataset.qty || 1;

    removeFromCart(btn.dataset.id, qty);
    alert("Producto eliminado del carrito");
    window.location.href = "/cart";
  } catch (err) {
    console.log("Error removing product: ", err);
  }
});

const logoutBtn = document.getElementById("logoutBtn");

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

const buyBtn = document.getElementById("buyBtn");

if (buyBtn) {
  buyBtn.addEventListener("click", () => {
    const url = buyBtn.getAttribute("data-url");
    if (url) {
      window.open(url, "_blank");
    } else {
      console.error("URL de WhatsApp no disponible");
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".fadeInUp-animation").forEach((el) => {
    observer.observe(el);
  });
});
