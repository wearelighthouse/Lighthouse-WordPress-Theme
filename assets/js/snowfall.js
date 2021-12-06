(function(){
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    return;
  }

  const headerBackgroundElement = document.querySelector('.c-hero__background');
  const canvas = headerBackgroundElement.appendChild(document.createElement('canvas'));
  const ctx = canvas.getContext('2d');
  let W, H, widthHeightRatio, maxParticles, particles;
  let angle = 0;
  let previousTimestamp = 0;

  function Particle() {
    this.x = Math.random() * W;
    this.y = Math.random() * H;
    this.r = Math.random() * 4 + 1;
    this.density = Math.random() * maxParticles;
    this.draw = () => {
      ctx.moveTo(this.x, this.y);
      ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
    };
    this._update = (dt) => {
      this.y += (Math.cos(angle + this.density) + 1 + this.r / 2) * dt;
      this.x += Math.sin(angle) * 2 * dt;

      const offscreen = this.x > W + this.r || this.x < -this.r || this.y > H;

      if (offscreen) {
        if (Math.random() < widthHeightRatio) {
          this.x = Math.random() * W;
          this.y = -this.r;
        } else {
          this.y = Math.random() * H;
          this.x = Math.sin(angle) > 0 ? - this.r : W + this.r;
        }
      }
    };
  }

  function setup() {
    W = canvas.width = headerBackgroundElement.clientWidth;
    H = canvas.height = headerBackgroundElement.clientHeight;
    widthHeightRatio = (1 / (W + H)) * W;
    maxParticles = Math.floor(W * H / 30000);
    particles = [...Array(maxParticles)].map(p => new Particle);
  }

  function step(timestamp) {
    const elapsed = timestamp - previousTimestamp;
    previousTimestamp = timestamp;
    angle += elapsed / 3000;
    particles.forEach(p => p._update(elapsed / 30));
    ctx.clearRect(0, 0, W, H);
    ctx.fillStyle = '#fffd';
    ctx.beginPath();
    particles.forEach(p => p.draw());
    ctx.fill();
    requestAnimationFrame(step);
  }

  setup();
  requestAnimationFrame(step);

  window.addEventListener('resize', setup);
})();
