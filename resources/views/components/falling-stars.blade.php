<div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
    <div class="absolute inset-0 bg-gradient-to-b from-[#1a1a2e] via-[#16213e] to-[#1a1a2e] opacity-95"></div>
    <div id="sakura-container" class="absolute inset-0"></div>
</div>

<style>
.sakura {
    position: absolute;
    width: 20px;
    height: 20px;
    background: radial-gradient(circle at 30% 30%, #ffd7e5, #ffb7c5);
    border-radius: 150% 0 150% 0;
    transform-origin: center;
    opacity: 0;
    filter: drop-shadow(0 0 2px rgba(255, 183, 197, 0.3));
}

@keyframes falling {
    0% {
        transform: translate(var(--startX), -10%) rotate(0deg);
        opacity: 0;
    }
    10% {
        opacity: 0.8;
    }
    90% {
        opacity: 0.8;
    }
    100% {
        transform: translate(var(--endX), 110vh) rotate(var(--rotation));
        opacity: 0;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('sakura-container');
    const petalsCount = 15;

    function createPetal() {
        const petal = document.createElement('div');
        petal.className = 'sakura';

        const startX = Math.random() * window.innerWidth;
        const endX = startX + (-50 + Math.random() * 100);
        const rotation = Math.random() * 360;
        const duration = 8 + Math.random() * 5;
        const delay = Math.random() * 5;
        const scale = 0.3 + Math.random() * 0.7;

        petal.style.setProperty('--startX', `${startX}px`);
        petal.style.setProperty('--endX', `${endX}px`);
        petal.style.setProperty('--rotation', `${rotation}deg`);
        petal.style.animation = `falling ${duration}s linear ${delay}s infinite`;
        petal.style.transform = `scale(${scale})`;
        petal.style.left = '0';
        petal.style.top = '0';

        container.appendChild(petal);
    }

    for (let i = 0; i < petalsCount; i++) {
        createPetal();
    }
});
</script>
