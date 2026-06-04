<!-- Global Footer (52px, fixed) -->
<footer class="fixed bottom-0 left-0 lg:left-[240px] right-0 h-[52px] bg-surface-container border-t border-outline-variant flex items-center justify-between px-8 z-40">
<div class="flex items-center gap-2">
<span class="text-xs font-extrabold text-on-surface">SPK ARAS Laptop Gaming</span>
<span class="text-[10px] text-on-surface-variant font-medium border-l border-outline-variant/30 pl-2">© <?= date('Y') ?> SQA-v1.0 • ARAS Analytical Framework</span>
</div>
<div class="flex items-center gap-6">
<span class="text-[10px] text-on-surface-variant font-bold uppercase tracking-tighter hidden md:block">SQA Disclaimer: Algoritma telah divalidasi sesuai standar metodologi ARAS.</span>
<nav class="flex gap-4">
<a class="text-[10px] font-bold text-on-surface-variant hover:text-primary uppercase tracking-tighter" href="#">Privacy</a>
<a class="text-[10px] font-bold text-on-surface-variant hover:text-primary uppercase tracking-tighter" href="#">Methodology</a>
</nav>
</div>
</footer>
<script>
        document.addEventListener('DOMContentLoaded', () => {
            const bars = document.querySelectorAll('.ki-progress-gradient, .bg-benefit, .bg-cost, .bg-outline, .bg-outline-variant');
            bars.forEach(bar => {
                const finalWidth = bar.style.width;
                if (finalWidth) {
                    bar.style.width = '0%';
                    setTimeout(() => {
                        bar.style.transition = 'width 1.2s cubic-bezier(0.34, 1.56, 0.64, 1)';
                        bar.style.width = finalWidth;
                    }, 300);
                }
            });
        });
    </script>
</body>
</html>
