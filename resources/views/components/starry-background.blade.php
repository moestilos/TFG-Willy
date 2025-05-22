<div class="fixed inset-0 z-0">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-slate-900 via-purple-900 to-slate-900"></div>
    <div id="stars" class="absolute inset-0"></div>
</div>

<style>
@keyframes twinkle {
    0% { opacity: 0; }
    50% { opacity: 1; }
    100% { opacity: 0; }
}

#stars::before, #stars::after {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(2px 2px at var(--x) var(--y), white, transparent);
    background-size: 200px 200px;
    animation: twinkle 5s infinite;
}

#stars::after {
    background-image: radial-gradient(1px 1px at var(--x) var(--y), white, transparent);
    background-size: 150px 150px;
    animation-delay: -2.5s;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.getElementById('stars');
    stars.style.setProperty('--x', Math.random() * 100 + '%');
    stars.style.setProperty('--y', Math.random() * 100 + '%');
});
</script>
