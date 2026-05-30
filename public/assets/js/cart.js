import { getCart } from "./cart/get.js";
import { removeFromCart } from "./cart/remove.js";

const announcementText = document.getElementById("announcementText");

let announcementNum = 0;
let messages = [
  "Personaliza tu producto favorito.",
  "Impresión digital de alta calidad.",
  "Ideal para regalos originales, cumpleaños y detalles corporativos.",
];

function announcementAnim() {
  announcementText.classList.remove("show");

  setTimeout(() => {
    announcementNum = (announcementNum + 1) % messages.length;

    announcementText.textContent = messages[announcementNum];

    announcementText.classList.add("show");
  }, 400);
}

announcementText.textContent = messages[announcementNum];
announcementText.classList.add("slide", "show");

setInterval(announcementAnim, 4000);

async function calTotal() {
  try {
    const cart = await getCart();
    if (!cart || cart.items.length === 0) {
      const totalContainer = document.getElementById("cart_total");
      totalContainer.innerHTML = "";

      const buyBtn = document.getElementById("buyBtn");
      if (buyBtn) {
        buyBtn.remove();
      }

      await main();
      return;
    }

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
    console.error("Error al renderiazar total: ", err);
  }
}

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
                    <p>
                      Cantidad: 
                      <span class="quantity">${p.quantity}</span>
                      <button class="decreaseBtn" data-id="${p.product_id}" style="border: none; background: none; cursor: pointer;">▼</button>
                    </p>
                    <p>
                      Total: 
                      <span class="total">$${Number(p.subtotal).toLocaleString("es-CO")}
                    </p>

                  <button class="removeBtn card-button" data-id="${p.product_id}" data-qty="${p.quantity}">Quitar del carrito</button>
                  </div>
              `;

      container.appendChild(card);
      observer.observe(card);
    });

    await calTotal();
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

document.addEventListener("click", async (e) => {
  const decreaseBtn = e.target.closest(".decreaseBtn");

  if (decreaseBtn) {
    e.preventDefault();

    try {
      const productId = decreaseBtn.dataset.id;

      const res = await removeFromCart(productId, 1);

      if (res.success) {
        const card = decreaseBtn.closest(".product-card");
        const qtyEl = card.querySelector(".quantity");
        const totalEl = card.querySelector(".total");

        let currentQty = parseInt(qtyEl.textContent);

        let subTotal = parseFloat(
          totalEl.textContent.replaceAll("$", "").replaceAll(".", ""),
        );
        subTotal = subTotal - subTotal / currentQty;

        currentQty--;

        if (currentQty <= 0) {
          card.remove();
          calTotal();
        } else {
          totalEl.textContent = "$" + Number(subTotal).toLocaleString("es-CO");
          qtyEl.textContent = currentQty;
          calTotal();
        }
      }
    } catch (err) {
      console.log("Error decreasing quantity: ", err);
    }

    return;
  }

  const btn = e.target.closest(".removeBtn");
  if (!btn) return;

  try {
    const productId = btn.dataset.id;
    const qty = btn.dataset.qty || 1;

    const res = await removeFromCart(productId, qty);

    if (res.success) {
      const card = btn.closest(".product-card");
      card.remove();
      calTotal();
    }
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
