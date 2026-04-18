<style>
    .demo-message {
        position: fixed;
        bottom: 24px;
        left: 24px;
        background: rgba(15, 15, 15, 0.8);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        color: #fff;
        padding: 10px 16px;
        border-radius: 50px;
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.3px;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.1);
        z-index: 9999;
        pointer-events: none;
        transition: all 0.3s ease;
        animation: demoSlideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .demo-message::before {
        content: '';
        display: block;
        width: 10px;
        height: 10px;
        background: #ff4b2b;
        background: linear-gradient(to right, #ff416c, #ff4b2b);
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(255, 75, 43, 0.5);
        animation: demoPulse 2s infinite;
    }

    @keyframes demoPulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 75, 43, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(255, 75, 43, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 75, 43, 0); }
    }

    @keyframes demoSlideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @media (max-width: 768px) {
        .demo-message {
            bottom: 16px;
            left: 16px;
            padding: 8px 14px;
            font-size: 11px;
        }
    }
</style>

<div class="demo-message">
    <span>MODO DEMO • Pedidos no reales</span>
</div>