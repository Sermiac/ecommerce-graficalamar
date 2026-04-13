import { addToCart } from "./cart/add.js";

const params = new URLSearchParams(window.location.search);
const category = params.get("category");

function loadProducts(category = null) {
  let url = "/api/get_products.php";

  if (category) {
    url += `?category=${encodeURIComponent(category)}`;
  }

  fetch(url)
    .then((res) => res.json())
    .then(renderProducts)
    .catch(console.error);
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
  { threshold: 0.1 }
);

function renderProducts(products) {
  const container = document.getElementById("products");
  container.innerHTML = "";

  if (!products.length) {
    container.innerHTML = '<h1 class="title">No hay productos</p>';
    return;
  }

  products.forEach((p) => {
    const card = document.createElement("div");
    card.className = "card-container fadeInUp-animation";

    card.innerHTML = `
      <div class="product-card">
        <img src="/assets/img/${p.image}" alt="${p.name}">
        <p class="product-name">${p.name}</p>
        <p>${p.description}</p>
        <p>$ ${p.price}</p>
        <button class="card-button" data-id="${p.id}">
          Agregar al carrito
        </button>
      </div>
    `;

    container.appendChild(card);
    observer.observe(card);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".fadeInUp-animation").forEach((el) => {
    observer.observe(el);
  });
});

loadProducts(category);

document.addEventListener("click", (e) => {
  if (e.target.closest(".card-button")) {
    const button = e.target.closest(".card-button");
    addToCart(button.dataset.id);
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
