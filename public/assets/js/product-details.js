import { addToCart } from "./cart/add.js";

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const productId = urlParams.get("id");

if (!productId) {
  window.location.href = "/";
}

const cartBtn = document.getElementById("cartBtn");
cartBtn.addEventListener("click", () => {
  const qtyInput = document.getElementById("quantity");
  const qty = qtyInput ? parseInt(qtyInput.value) : 1;
  addToCart(productId, qty);
});

async function initWhatsapp() {
  const whatsappBtn = document.getElementById("whatsapp");
  if (!whatsappBtn) return;

  const res = await fetch("/api/contact.php");
  const data = await res.json();

  let url =
    data.url +
    "?text=Hola, quiero saber mas sobre los productos personalizados";

  whatsappBtn.href = url;
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

async function getProduct() {
  const res = await fetch(`/api/get_product.php?id=${productId}`);
  const data = await res.json();
  if (data.error) {
    console.error(data.error);
    window.location.href = "/";
    return;
  }
  return data;
}

function renderProduct(product) {
  if (!product) return;
  const imageEl = document.querySelector(".main-image");
  const titleEl = document.querySelector(".product-title");
  const priceEl = document.querySelector(".product-price");
  const descriptionEl = document.querySelector(".product-description");

  if (imageEl) {
    imageEl.src = `/assets/img/${product.image}`;
    imageEl.alt = product.name;
  }
  if (titleEl) titleEl.textContent = product.name;
  if (priceEl)
    priceEl.textContent = `$${Number(product.price).toLocaleString("es-CO")}`;
  if (descriptionEl) descriptionEl.textContent = product.description;
}

async function main() {
  const product = await getProduct();
  renderProduct(product);
}

main();

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
