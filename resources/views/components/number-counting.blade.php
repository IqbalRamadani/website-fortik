<div class="bg-gradient-to-r from-koamaru to-matcha">
    <div class="grid grid-cols-1 max-w-4xl mx-auto -mt-2 px-12 py-6 md:-mt-4 lg:-mt-16 lg:px-8 lg:py-16 md:grid-cols-2 gap-8">    
        <!-- Card 1: Active Users -->
        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 shadow-2xl transition-all duration-300 animate-fadeInUp">
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold text-blue-400 mb-4" id="counter1">0</div>
                <h3 class="text-2xl font-bold text-white mb-2">Divisi</h3>
            </div>
        </div>
        
        <!-- Card 2: Total Members -->
        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-8 border border-white/20 shadow-2xl transition-all duration-300 animate-fadeInUp" style="animation-delay: 0.2s;">
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold text-purple-400 mb-4" id="counter2">00</div>
                <h3 class="text-2xl font-bold text-white mb-2">Anggota</h3>
            </div>
        </div>
    </div>
</div>

<script>
    class CounterAnimation {
        constructor(elementId, targetValue, duration = 2000, progressBarId = null) {
            this.element = document.getElementById(elementId);
            this.progressBar = progressBarId ? document.getElementById(progressBarId) : null;
            this.targetValue = targetValue;
            this.duration = duration;
            this.currentValue = 0;
            this.isAnimating = false;
        }

        easeOutQuart(t) {
            return 1 - Math.pow(1 - t, 4);
        }

        formatNumber(num) {
            return num.toLocaleString();
        }

        animate() {
            if (this.isAnimating) return;
            
            this.isAnimating = true;
            const startTime = Date.now();
            const startValue = this.currentValue;

            const animateStep = () => {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / this.duration, 1);
                const easedProgress = this.easeOutQuart(progress);
                
                this.currentValue = Math.round(startValue + (this.targetValue - startValue) * easedProgress);
                this.element.textContent = this.formatNumber(this.currentValue);
                
                // Update progress bar if exists
                if (this.progressBar) {
                    const progressPercentage = (this.currentValue / this.targetValue) * 100;
                    this.progressBar.style.width = `${progressPercentage}%`;
                }
                
                if (progress < 1) {
                    requestAnimationFrame(animateStep);
                } else {
                    this.isAnimating = false;
                }
            };

            requestAnimationFrame(animateStep);
        }

        reset() {
            this.currentValue = 0;
            this.element.textContent = '0';
            if (this.progressBar) {
                this.progressBar.style.width = '0%';
            }
            this.isAnimating = false;
        }
    }

    // Initialize counters
    const counter1 = new CounterAnimation('counter1', 6, 2000, 'progress1');
    const counter2 = new CounterAnimation('counter2', 27, 2500, 'progress2');

    // Start animations with delays
    function startAnimations() {
        setTimeout(() => counter1.animate(), 500);
        setTimeout(() => counter2.animate(), 800);
    }

    // Reset function
    function resetAnimations() {
        counter1.reset();
        counter2.reset();
        startAnimations();
    }

    // Intersection Observer for scroll-triggered animations
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !counter1.isAnimating && !counter2.isAnimating) {
                // Reset immediately
                counter1.reset();
                counter2.reset();
                
                // Start animation after 3 second delay
                setTimeout(() => {
                    startAnimations();
                }, 2000);
            }
        });
    }, observerOptions);

    // Observe the container
    const container = document.querySelector('.grid');
    observer.observe(container);
</script>