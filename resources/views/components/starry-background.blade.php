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
    background-image: radial-gradient(3px 3px at var(--x) var(--y), white, transparent); /* Aumentado de 2px a 3px */
    background-size: 150px 150px; /* Reducido de 200px para más densidad */
    animation: twinkle 5s infinite;
}

#stars::after {
    background-image: radial-gradient(1.5px 1.5px at var(--x) var(--y), white, transparent); /* Aumentado de 1px a 1.5px */
    background-size: 100px 100px; /* Reducido de 150px para más densidad */
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
