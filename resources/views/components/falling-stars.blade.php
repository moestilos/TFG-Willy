<div class="fixed inset-0 z-0 bg-black">
    <div id="stars" class="absolute inset-0 overflow-hidden"></div>
</div>

<style>
@keyframes fall {
    0% {
        transform: translateY(-100%) rotate(45deg);
        opacity: 1;
    }
    85% {
        opacity: 1;
    }
    100% {
        transform: translateY(200vh) rotate(45deg);
        opacity: 0;
    }
}

.star {
    position: absolute;
    width: 2px;
    height: 2px;
    background: linear-gradient(45deg, #fff, transparent);
    border-radius: 50%;
    animation: fall linear infinite;
}
</style>

<script>
function createStar() {
    const star = document.createElement('div');
    star.className = 'star';
    star.style.left = Math.random() * 100 + 'vw';
    star.style.animationDuration = Math.random() * 3 + 2 + 's';
    document.getElementById('stars').appendChild(star);
    setTimeout(() => star.remove(), 5000);
}

document.addEventListener('DOMContentLoaded', () => {
    setInterval(createStar, 100);
});
</script>
