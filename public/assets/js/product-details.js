import { addToCart } from "./cart/add.js";

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
  const imageEls = document.querySelectorAll(".main-image");
  const titleEl = document.querySelector(".product-title");
  const priceEl = document.querySelector(".product-price");
  const descriptionEl = document.querySelector(".product-description");

  if (imageEls.length > 0) {
    const baseImage = product.image;
    const dotIndex = baseImage.lastIndexOf(".");
    const name = baseImage.substring(0, dotIndex);
    const ext = baseImage.substring(dotIndex);

    imageEls[0].src = `/assets/img/${baseImage}`;
    imageEls[0].alt = product.name;
    imageEls[0].onerror = () => (imageEls[0].style.display = "none");

    if (imageEls[1]) {
      imageEls[1].src = `/assets/img/${name}2${ext}`;
      imageEls[1].alt = `${product.name} 2`;
      imageEls[1].onerror = () => (imageEls[1].style.display = "none");
    }
    if (imageEls[2]) {
      imageEls[2].src = `/assets/img/${name}3${ext}`;
      imageEls[2].alt = `${product.name} 3`;
      imageEls[2].onerror = () => (imageEls[2].style.display = "none");
    }
    if (imageEls[3]) {
      imageEls[3].src = `/assets/img/${name}4${ext}`;
      imageEls[3].alt = `${product.name} 4`;
      imageEls[3].onerror = () => (imageEls[3].style.display = "none");
    }
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
