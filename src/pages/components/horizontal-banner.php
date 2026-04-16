
<style>
  @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;700;800&display=swap');

  .banner-wrap {
    width: 100%;
    min-height: 220px;
    max-height: 260px;
    background: linear-gradient(120deg, #ffe0ec 0%, #fff0f5 40%, #ffd6e7 80%, #ffb6c8 100%);
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

  .hearts-bg {
    position: absolute; inset: 0; pointer-events: none; overflow: hidden;
  }
  .heart {
    position: absolute;
    font-size: 22px;
    opacity: 0.18;
    animation: floatHeart 6s ease-in-out infinite;
  }
  @keyframes floatHeart {
    0%,100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-12px) scale(1.12); }
  }

  .left-col {
    display: flex; flex-direction: column; gap: 10px; z-index: 2; max-width: 280px;
  }
  .badge-tag {
    display: inline-block;
    background: #e8325a;
    color: #fff;
    font-family: 'Fredoka One', cursive;
    font-size: 13px;
    padding: 4px 14px;
    border-radius: 30px;
    letter-spacing: 1px;
    text-transform: uppercase;
    width: fit-content;
  }
  .title-main {
    font-family: 'Fredoka One', cursive;
    font-size: 36px;
    color: #c0174b;
    line-height: 1.1;
    margin: 0;
    text-shadow: 2px 2px 0 #ffe0ec;
  }
  .title-sub {
    font-size: 15px;
    color: #a0446a;
    margin: 0;
    font-weight: 700;
    line-height: 1.4;
  }
  .cta-btn {
    display: inline-block;
    background: #e8325a;
    color: #fff;
    font-family: 'Fredoka One', cursive;
    font-size: 16px;
    padding: 10px 26px;
    border-radius: 50px;
    text-decoration: none;
    margin-top: 4px;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 16px #e8325a44;
    cursor: pointer;
    border: none;
    transition: transform 0.15s;
    width: fit-content;
  }
  .cta-btn:hover { transform: scale(1.05); }

  .cta-link {
    text-decoration: none;
    color: white;
  }

  .phone-row {
    display: flex; align-items: center; gap: 8px; margin-top: 2px;
  }
  .phone-icon {
    width: 18px; height: 18px; fill: #e8325a;
  }
  .phone-num {
    font-size: 16px; font-weight: 800; color: #c0174b; letter-spacing: 1px;
  }

  .center-col {
    display: flex; align-items: flex-end; justify-content: center; z-index: 2; gap: 10px;
    position: relative;
  }
  .mug-wrapper {
    position: relative; display: flex; align-items: flex-end;
  }
  .mug-img {
    width: 130px; height: 130px; object-fit: contain;
    filter: drop-shadow(0 8px 18px #e8325a33);
  }
  .mug-label {
    position: absolute; bottom: 8px; left: 50%; transform: translateX(-50%);
    background: rgba(255,255,255,0.88);
    color: #c0174b;
    font-family: 'Fredoka One', cursive;
    font-size: 12px;
    padding: 2px 10px;
    border-radius: 20px;
    white-space: nowrap;
  }
  .mug-big .mug-img { width: 155px; height: 155px; }

  .right-col {
    display: flex; flex-direction: column; align-items: flex-end; gap: 10px; z-index: 2;
  }
  .graff-logo {
    display: flex; flex-direction: column; align-items: center; gap: 4px;
  }
  .graff-circle {
    width: 58px; height: 58px;
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
    color: #c0174b; font-size: 18px; letter-spacing: 1px;
  }
  .feature-pills {
    display: flex; flex-direction: column; align-items: flex-end; gap: 6px;
  }
  .pill {
    background: #fff;
    border: 1.5px solid #f5b8cb;
    color: #c0174b;
    font-size: 12px; font-weight: 700;
    padding: 4px 14px;
    border-radius: 20px;
  }

  .deco-heart-large {
    position: absolute; font-size: 80px; opacity: 0.07; right: 220px; top: 20px; z-index: 1; pointer-events: none;
  }

@media (max-width: 768px) {

  .banner-wrap {
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: auto;
    max-height: none;
    padding: 20px;
    gap: 16px;
    text-align: center;
    overflow: visible;
  }

  .cta-btn {
    position: relative;
    bottom: 15px;
    left: 50%;
    transform: translateX(-50%);
    width: calc(100% - 40px);
    text-align: center;
    z-index: 10;
  }

  .left-col {
    max-width: 100%;
    align-items: center;
  }

  .right-col {
    align-items: center;
  }

  .center-col {
    order: -1;
  }


  .title-main {
    font-size: 22px;
  }

  .title-sub {
    font-size: 13px;
  }

  .badge-tag {
    font-size: 11px;
  }

  .mug-label {
    font-size: 10px;
  }

  .mug-img {
    width: 90px;
    height: 90px;
  }

  .mug-big .mug-img {
    width: 110px;
    height: 110px;
  }

  .cta-btn {
    font-size: 14px;
    padding: 8px 18px;
  }

  .feature-pills {
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
  }

  .pill {
    font-size: 10px;
    padding: 4px 10px;
  }

  .deco-heart-large {
    display: none;
  }
}
</style>

<div class="banner-wrap fadeInUp-animation">
  <div class="hearts-bg">
    <span class="heart" style="left:5%;top:12%;animation-delay:0s">♥</span>
    <span class="heart" style="left:18%;top:70%;animation-delay:1s">♥</span>
    <span class="heart" style="left:35%;top:8%;animation-delay:2s">♥</span>
    <span class="heart" style="left:55%;top:75%;animation-delay:0.5s">♥</span>
    <span class="heart" style="left:70%;top:15%;animation-delay:1.5s">♥</span>
    <span class="heart" style="left:88%;top:60%;animation-delay:2.5s">♥</span>
    <span class="heart" style="left:92%;top:20%;animation-delay:3s">♥</span>
  </div>

  <div class="deco-heart-large">♥</div>

  <div class="left-col">
    <span class="badge-tag">Amor y Amistad</span>
    <p class="title-main">Mugs<br>Personalizados</p>
    <p class="title-sub">Regala amor con tu nombre impreso.<br>¡Diseños únicos para parejas y amigos!</p>
    <div class="phone-row">
      <svg class="phone-icon" viewBox="0 0 24 24"><path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.57 21 3 13.43 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.58a1 1 0 0 1-.24 1.01l-2.21 2.2z"/></svg>
      <span class="phone-num" id="phone-num">000</span>
    </div>
    <button class="cta-btn"><a class="cta-link" id="cta-link" href="/" target="_blank">¡Pídelo ya!</a></button>
  </div>

  <div class="center-col">
    <div class="mug-wrapper">
      <svg width="120" height="130" viewBox="0 0 120 130" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="mugGrad1" x1="0" y1="0" x2="1" y2="0">
            <stop offset="0%" stop-color="#ffd6e7"/>
            <stop offset="100%" stop-color="#ffb6c8"/>
          </linearGradient>
        </defs>
        <rect x="10" y="30" width="80" height="80" rx="8" fill="url(#mugGrad1)" stroke="#f5b8cb" stroke-width="1.5"/>
        <path d="M90 50 Q115 50 115 75 Q115 100 90 100" fill="none" stroke="#f5b8cb" stroke-width="7" stroke-linecap="round"/>
        <ellipse cx="50" cy="30" rx="40" ry="7" fill="#ffe0ec" stroke="#f5b8cb" stroke-width="1.5"/>
        <text x="50" y="80" text-anchor="middle" font-family="Fredoka One, cursive" font-size="16" fill="#c0174b">Juana</text>
        <text x="38" y="62" font-size="14">♥</text>
        <text x="52" y="55" font-size="10">♥</text>
      </svg>
      <span class="mug-label">Para ella</span>
    </div>
    <div class="mug-wrapper mug-big">
      <svg width="150" height="155" viewBox="0 0 150 155" xmlns="http://www.w3.org/2000/svg">
        <rect x="10" y="25" width="100" height="100" rx="8" fill="#fff" stroke="#f5b8cb" stroke-width="1.5"/>
        <path d="M110 45 Q138 45 138 75 Q138 105 110 105" fill="none" stroke="#f5b8cb" stroke-width="8" stroke-linecap="round"/>
        <ellipse cx="60" cy="25" rx="50" ry="8" fill="#f9f9f9" stroke="#f5b8cb" stroke-width="1.5"/>
        <text x="60" y="90" text-anchor="middle" font-family="Fredoka One, cursive" font-size="14" fill="#c0174b">Juan</text>
        <text x="42" y="68" font-size="12" fill="#e8325a">♥</text>
        <text x="58" y="58" font-size="9" fill="#e8325a">♥</text>
        <text x="72" y="65" font-size="11" fill="#e8325a">♥</text>
      </svg>
      <span class="mug-label">Para él</span>
    </div>
  </div>

  <div class="right-col">
    <div class="graff-logo">
      <div class="graff-circle"><span class="graff-letter">G</span></div>
      <span class="graff-name">Grafi</span>
    </div>
    <div class="feature-pills">
      <span class="pill">Nombres personalizados</span>
      <span class="pill">Envío a domicilio</span>
      <span class="pill">Par de mugs</span>
    </div>
  </div>
</div>

<script>
(async function() {
  const phoneData = document.getElementById("phone-num");
  const whatsappLink = document.getElementById("cta-link");
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
    console.error("Error en el banner horizontal:", err);
  }
})();
</script>