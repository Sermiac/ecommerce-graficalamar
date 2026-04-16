
<style>
  @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;700;800&display=swap');

  .banner-wrap {
    width: 100%;
    min-height: 280px;
    max-height: 300px;
    background: linear-gradient(120deg, #fff3e0 0%, #fff8f0 40%, #ffe0ec 75%, #ffd6e7 100%);
    border-radius: 18px;
    overflow: hidden;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 40px;
    box-sizing: border-box;
    font-family: 'Nunito', sans-serif;
  }

  .deco-bg {
    position: absolute; inset: 0; pointer-events: none; overflow: hidden;
  }
  .deco-icon {
    position: absolute;
    font-size: 22px;
    opacity: 0.13;
    animation: floatDeco 7s ease-in-out infinite;
  }
  @keyframes floatDeco {
    0%,100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-10px) scale(1.1); }
  }

  .left-col {
    display: flex; flex-direction: column; gap: 9px; z-index: 2; max-width: 290px;
  }
  .badge-tag {
    display: inline-block;
    background: #e8610a;
    color: #fff;
    font-family: 'Fredoka One', cursive;
    font-size: 12px;
    padding: 4px 14px;
    border-radius: 30px;
    letter-spacing: 1px;
    text-transform: uppercase;
    width: fit-content;
  }
  .title-main {
    font-family: 'Fredoka One', cursive;
    font-size: 34px;
    color: #c04a0a;
    line-height: 1.1;
    margin: 0;
    text-shadow: 2px 2px 0 #ffe0c8;
  }
  .title-sub {
    font-size: 13.5px;
    color: #a0563a;
    margin: 0;
    font-weight: 700;
    line-height: 1.5;
  }
  .cta-btn {
    display: inline-block;
    background: #e8610a;
    color: #fff;
    font-family: 'Fredoka One', cursive;
    font-size: 15px;
    padding: 10px 24px;
    border-radius: 50px;
    cursor: pointer;
    border: none;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 16px #e8610a44;
    transition: transform 0.15s;
    width: fit-content;
    margin-top: 2px;
  }
  .cta-btn:hover { transform: scale(1.05); }

  .cta-link {
    text-decoration: none;
    color: white;
  }

  .phone-row {
    display: flex; align-items: center; gap: 8px;
  }
  .phone-icon { width: 17px; height: 17px; fill: #e8610a; }
  .phone-num {
    font-size: 15px; font-weight: 800; color: #c04a0a; letter-spacing: 1px;
  }

  .center-col {
    display: flex; align-items: flex-end; justify-content: center;
    z-index: 2; gap: 16px; position: relative;
  }

  .product-banner {
    display: flex; flex-direction: column; align-items: center; gap: 6px;
    background: rgba(255,255,255,0.72);
    border: 1.5px solid #f5c8a8;
    border-radius: 14px;
    padding: 12px 14px 8px;
  }
  .product-icon-wrap {
    width: 72px; height: 72px;
    display: flex; align-items: center; justify-content: center;
    background: #fff3e0;
    border-radius: 12px;
  }
  .product-label {
    font-family: 'Fredoka One', cursive;
    font-size: 12px;
    color: #c04a0a;
    text-align: center;
  }
  .product-banner.featured {
    border-color: #e8610a;
    background: rgba(255,255,255,0.88);
    box-shadow: 0 4px 18px #e8610a22;
  }
  .product-banner.featured .product-icon-wrap {
    background: #ffe0c8;
  }

  .right-col {
    display: flex; flex-direction: column; align-items: flex-end; gap: 10px; z-index: 2;
  }
  .graff-logo {
    display: flex; flex-direction: column; align-items: center; gap: 4px;
  }
  .graff-circle {
    width: 56px; height: 56px;
    background: #1a1a1a;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
  }
  .graff-letter {
    font-family: 'Fredoka One', cursive;
    color: #fff; font-size: 22px;
  }
  .graff-name {
    font-family: 'Fredoka One', cursive;
    color: #c04a0a; font-size: 17px; letter-spacing: 1px;
  }
  .feature-pills {
    display: flex; flex-direction: column; align-items: flex-end; gap: 5px;
  }
  .pill {
    background: #fff;
    border: 1.5px solid #f5c8a8;
    color: #c04a0a;
    font-size: 11.5px; font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    white-space: nowrap;
  }

  .event-tags {
    display: flex; flex-wrap: wrap; gap: 5px; margin-top: 2px;
  }
  .event-tag {
    background: #fff3e0;
    border: 1px solid #f5c8a8;
    color: #a0563a;
    font-size: 11px; font-weight: 700;
    padding: 3px 10px;
    border-radius: 20px;
  }
</style>

<div class="banner-wrap fadeInUp-animation">
  <div class="deco-bg">
    <span class="deco-icon" style="left:4%;top:10%;animation-delay:0s">🎁</span>
    <span class="deco-icon" style="left:16%;top:72%;animation-delay:1.2s">✨</span>
    <span class="deco-icon" style="left:32%;top:6%;animation-delay:0.6s">🎉</span>
    <span class="deco-icon" style="left:52%;top:78%;animation-delay:2s">🎀</span>
    <span class="deco-icon" style="left:68%;top:10%;animation-delay:1.5s">⭐</span>
    <span class="deco-icon" style="left:85%;top:65%;animation-delay:0.3s">🎊</span>
    <span class="deco-icon" style="left:93%;top:18%;animation-delay:2.8s">🎁</span>
  </div>

  <div class="left-col">
    <span class="badge-tag">Diseños Personalizados</span>
    <p class="title-main">Regalos únicos<br>para cada momento</p>
    <!-- <p class="title-sub">Mugs, camisetas, gorras y más,<br>con tu nombre o diseño especial.</p> -->
    <div class="event-tags">
      <span class="event-tag">Cumpleaños</span>
      <span class="event-tag">Bodas</span>
      <span class="event-tag">Grados</span>
      <span class="event-tag">Amor y Amistad</span>
      <span class="event-tag">Y muchos más</span>
    </div>
    <div class="phone-row">
      <svg class="phone-icon" viewBox="0 0 24 24"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.57 21 3 13.43 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.58a1 1 0 0 1-.24 1.01l-2.21 2.2z"/></svg>
      <span class="phone-num" id="phone-num2">000</span>
    </div>
    <button class="cta-btn"><a class="cta-link" id="cta-link2" href="/" target="_blank">¡Pide el tuyo!</a></button>
  </div>

  <div class="center-col">
    <div class="product-banner">
      <div class="product-icon-wrap">
        <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
          <rect x="6" y="16" width="36" height="28" rx="4" fill="#ffd6b0" stroke="#e8610a" stroke-width="1.5"/>
          <path d="M20 16 Q20 8 24 8 Q28 8 28 16" fill="none" stroke="#e8610a" stroke-width="1.5"/>
          <rect x="6" y="12" width="36" height="6" rx="3" fill="#e8610a"/>
          <line x1="24" y1="12" x2="24" y2="44" stroke="#fff" stroke-width="1.5"/>
          <line x1="6" y1="25" x2="42" y2="25" stroke="#e8610a" stroke-width="0.8" stroke-dasharray="3,2"/>
        </svg>
      </div>
      <span class="product-label">Regalos<br>especiales</span>
    </div>

    <div class="product-banner featured">
      <div class="product-icon-wrap">
        <svg width="58" height="58" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg">
          <rect x="8" y="18" width="34" height="30" rx="4" fill="#ffe0c8" stroke="#e8610a" stroke-width="1.5"/>
          <path d="M42 28 Q54 28 54 33 Q54 38 42 38" fill="none" stroke="#e8610a" stroke-width="4" stroke-linecap="round"/>
          <ellipse cx="25" cy="18" rx="17" ry="4" fill="#fff3e0" stroke="#e8610a" stroke-width="1.2"/>
          <text x="25" y="38" text-anchor="middle" font-family="Fredoka One, cursive" font-size="9" fill="#c04a0a">Tu nombre</text>
          <text x="17" y="30" font-size="10" fill="#e8610a">♥</text>
          <text x="28" y="27" font-size="7" fill="#e8610a">★</text>
        </svg>
      </div>
      <span class="product-label">Mugs<br>personalizados</span>
    </div>

    <div class="product-banner">
      <div class="product-icon-wrap">
        <svg width="48" height="48" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 10 Q12 6 24 6 Q36 6 36 10 L38 36 Q38 42 24 42 Q10 42 10 36 Z" fill="#ffd6b0" stroke="#e8610a" stroke-width="1.5"/>
          <path d="M14 14 Q24 18 34 14" fill="none" stroke="#e8610a" stroke-width="1" stroke-dasharray="2,2"/>
          <text x="24" y="30" text-anchor="middle" font-family="Fredoka One, cursive" font-size="8" fill="#c04a0a">Graff</text>
          <text x="24" y="22" text-anchor="middle" font-size="10" fill="#e8610a">★</text>
        </svg>
      </div>
      <span class="product-label">Camisetas<br>y gorras</span>
    </div>
  </div>

  <div class="right-col">
    <div class="graff-logo">
      <div class="graff-circle"><span class="graff-letter">G</span></div>
      <span class="graff-name">Grafi</span>
    </div>
    <div class="feature-pills">
      <span class="pill">Diseño 100% personalizado</span>
      <span class="pill">Envío a domicilio</span>
      <span class="pill">Pedidos desde 1 unidad</span>
    </div>
  </div>
</div>

<script>
(async function() {
  const phoneData = document.getElementById("phone-num2");
  const whatsappLink = document.getElementById("cta-link2");
  if (!whatsappLink) return;
  try {
    const res = await fetch("/api/contact.php");
    const data = await res.json();
    if (data.phone) {
      let str = data.phone.slice(2);
      phoneData.textContent = str;
      whatsappLink.href = data.url;
    }
  } catch (err) {
    console.error("Error en el banner horizontal2:", err);
  }
})();
</script>