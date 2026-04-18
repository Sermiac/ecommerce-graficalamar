import { addToCart } from "./cart/add.js";

const params = new URLSearchParams(window.location.search);
const category = params.get("category");
const announcementText = document.getElementById("announcementText");

let announcementNum = 0;
let messages = [
  "Personaliza tu producto favorito.",
  "Impresión digital de alta calidad.",
  "Ideal para regalos originales, cumpleaños y detalles corporativos.",
];

let current = 1;
setInterval(() => {
  const b1 = document.getElementById("banner1");
  const b2 = document.getElementById("banner2");
  if (current === 1) {
    b1.style.opacity = "0";
    setTimeout(() => {
      b1.style.display = "none";
      b2.style.display = "";
      b2.style.opacity = "0";
      requestAnimationFrame(() => (b2.style.opacity = "1"));
    }, 400);
    current = 2;
  } else {
    b2.style.opacity = "0";
    setTimeout(() => {
      b2.style.display = "none";
      b1.style.display = "";
      b1.style.opacity = "0";
      requestAnimationFrame(() => (b1.style.opacity = "1"));
    }, 400);
    current = 1;
  }
}, 8000);

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
      <a href="/product-details?id=${p.id}" class="card-link">
        <img src="/assets/img/${p.image}" alt="${p.name}">
      </a>
        <p class="product-name">${p.name}</p>
        <p class="product-description">${p.description}</p>
        <p>$ ${Number(p.price).toLocaleString("es-CO")}</p>
      
        <button class="card-button" data-id="${p.id}">
          Agregar al carrito
        </button>

      </div>
    `;

    container.appendChild(card);
    observer.observe(card);
  });
}

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

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".fadeInUp-animation").forEach((el) => {
    observer.observe(el);
  });
});
