<section id="inicio" class="ic-hero d-flex align-items-center justify-content-center">
  <div class="ic-hero-overlay"></div>

  <canvas id="heroCanvas" aria-hidden="true"></canvas>

  <div class="container position-relative z-1 ic-hero-content">
    <p class="ic-eyebrow-light text-center w-100 d-block">Universidad Autónoma Gabriel René Moreno</p>
    <h1 class="ic-hero-title" id="heroTitle" style="opacity:0">Ingeniería Comercial</h1>
    <div class="ic-divider mx-auto my-3"></div>
    <p class="ic-hero-sub mx-auto text-center">
      Formamos líderes estratégicos con visión global, preparados para transformar
      organizaciones y generar valor en un entorno empresarial dinámico.
    </p>
    <div class="d-flex gap-3 justify-content-center flex-wrap mt-4">
      <a href="#mision"   class="btn ic-btn-primary">Conoce la carrera</a>
      <a href="#contacto" class="btn ic-btn-ghost">Contacto</a>
    </div>
    <div class="ic-hero-stats d-flex justify-content-center flex-wrap gap-4 mt-5 pt-4">
      <div class="ic-stat">
        <span class="ic-stat-num">3800+</span>
        <span class="ic-stat-label">Estudiantes activos</span>
      </div>
      <div class="ic-stat">
        <span class="ic-stat-num">1992</span>
        <span class="ic-stat-label">Año de fundación</span>
      </div>
    </div>
  </div>

  <div class="ic-scroll-hint position-absolute bottom-0 start-50 translate-middle-x pb-4 text-center">
    <small class="d-block text-white-50 text-uppercase" style="letter-spacing:2px;font-size:.65rem">Scroll</small>
    <i class="fa-solid fa-chevron-down text-white-50 small"></i>
  </div>
</section>

<style>
.ic-hero { background-position: center 65% !important; }
.ic-hero-content { text-align: center; }
#heroCanvas {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 2;
}
/* El título usa CSS glow permanente una vez visible */
#heroTitle {
  position: relative;
  z-index: 3;
  opacity: 0;
  will-change: opacity, text-shadow;
}
#heroTitle.ic-title-glow {
  opacity: 1;
  animation: titleGlow 3s ease-in-out infinite alternate;
}
@keyframes titleGlow {
  0%   { text-shadow: 0 0 8px rgba(74,222,128,.4),  0 0 20px rgba(74,222,128,.2); }
  100% { text-shadow: 0 0 18px rgba(74,222,128,.75), 0 0 40px rgba(74,222,128,.35), 0 0 70px rgba(74,222,128,.15); }
}
</style>

<script>
(function () {
  'use strict';

  function rnd(a,b)    { return a + Math.random()*(b-a); }
  function rndInt(a,b) { return Math.floor(rnd(a,b+1)); }
  function pick(arr)   { return arr[rndInt(0,arr.length-1)]; }
  function lerp(a,b,t) { return a+(b-a)*t; }
  function clamp(v,lo,hi){ return v<lo?lo:v>hi?hi:v; }

  function easeOutBack(t) {
    var c1=1.70158, c3=c1+1;
    return 1+c3*Math.pow(t-1,3)+c1*Math.pow(t-1,2);
  }
  function easeInOutCubic(t) {
    return t<0.5?4*t*t*t:1-Math.pow(-2*t+2,3)/2;
  }
  function easeOutCubic(t){ return 1-Math.pow(1-t,3); }

  var SPARK_COLORS = ['#4ade80','#86efac','#ffffff','#22c55e'];

  function init() {
    var title  = document.getElementById('heroTitle');
    var canvas = document.getElementById('heroCanvas');
    if (!title || !canvas) return;
    var ctx = canvas.getContext('2d');

    var W, H, titleRect;

    function resize() {
      var sec = document.getElementById('inicio');
      W = sec.offsetWidth;
      H = sec.offsetHeight;
      canvas.width  = W;
      canvas.height = H;
      var tr  = title.getBoundingClientRect();
      var sr  = sec.getBoundingClientRect();
      titleRect = { left: tr.left-sr.left, top: tr.top-sr.top, width: tr.width, height: tr.height };
    }

    /* ── particles ── */
    var particles = [];
    function spawnSparks(x,y,n,burst) {
      for (var i=0;i<n;i++) {
        var angle = burst ? rnd(0,Math.PI*2) : rnd(-Math.PI*.6,Math.PI*.6)-Math.PI*.5;
        var speed = burst ? rnd(1.5,5) : rnd(1,3);
        particles.push({ x:x,y:y, vx:Math.cos(angle)*speed, vy:Math.sin(angle)*speed,
          life:1, decay:rnd(.02,burst?.05:.04), r:rnd(1,burst?3:2.2), color:pick(SPARK_COLORS) });
      }
    }
    function tickParticles() {
      for (var i=particles.length-1;i>=0;i--) {
        var p=particles[i];
        p.x+=p.vx; p.y+=p.vy; p.vy+=.07; p.life-=p.decay;
        if (p.life<=0){ particles.splice(i,1); continue; }
        ctx.save();
        ctx.globalAlpha=clamp(p.life,0,1);
        ctx.fillStyle=p.color; ctx.shadowColor=p.color; ctx.shadowBlur=6;
        ctx.beginPath(); ctx.arc(p.x,p.y,p.r,0,Math.PI*2); ctx.fill();
        ctx.restore();
      }
    }

    /* ── circuits ── */
    var circuits=[];
    var circuitStartTime=0;
    function buildCircuits() {
      circuits=[];
      var tx=titleRect.left+titleRect.width/2, ty=titleRect.top+titleRect.height/2;
      var n=rndInt(7,12);
      for (var i=0;i<n;i++) {
        var edge=rndInt(0,3), sx,sy;
        if(edge===0){sx=rnd(0,W);sy=0;}
        else if(edge===1){sx=W;sy=rnd(0,H);}
        else if(edge===2){sx=rnd(0,W);sy=H;}
        else{sx=0;sy=rnd(0,H);}
        var segs=[],px=sx,py=sy,steps=rndInt(2,4);
        for(var s=0;s<steps;s++){
          var last=s===steps-1;
          var ex=last?tx+rnd(-titleRect.width*.45,titleRect.width*.45):lerp(px,tx,rnd(.3,.7))+rnd(-80,80);
          var ey=last?ty+rnd(-titleRect.height*.6,titleRect.height*.6):lerp(py,ty,rnd(.3,.7))+rnd(-60,60);
          segs.push({x1:px,y1:py,x2:ex,y2:py});
          segs.push({x1:ex,y1:py,x2:ex,y2:ey});
          px=ex;py=ey;
        }
        var tl=0; segs.forEach(function(s){tl+=Math.abs(s.x2-s.x1)+Math.abs(s.y2-s.y1);});
        circuits.push({ segs:segs,totalLen:tl,drawn:0,speed:rnd(4,9),
          startDelay:i*120,startTime:-1,done:false,tipX:sx,tipY:sy,
          color:Math.random()<.7?'#4ade80':'#86efac',alpha:1 });
      }
    }
    function updateDrawCircuits(now) {
      var allDone=true;
      circuits.forEach(function(c){
        if(c.startTime<0){
          if(now>=circuitStartTime+c.startDelay) c.startTime=now;
          else{allDone=false;return;}
        }
        if(!c.done){ c.drawn=Math.min(c.drawn+c.speed,c.totalLen); if(c.drawn>=c.totalLen)c.done=true; else allDone=false; }
        ctx.save(); ctx.strokeStyle=c.color; ctx.lineWidth=1.2;
        ctx.shadowColor=c.color; ctx.shadowBlur=8; ctx.globalAlpha=c.alpha; ctx.lineCap='round';
        ctx.beginPath();
        var rem=c.drawn,started=false; c.tipX=c.segs[0].x1; c.tipY=c.segs[0].y1;
        for(var j=0;j<c.segs.length;j++){
          var seg=c.segs[j],len=Math.abs(seg.x2-seg.x1)+Math.abs(seg.y2-seg.y1);
          if(rem<=0)break;
          if(!started){ctx.moveTo(seg.x1,seg.y1);started=true;}
          if(rem>=len){ctx.lineTo(seg.x2,seg.y2);c.tipX=seg.x2;c.tipY=seg.y2;rem-=len;}
          else{var f=rem/len;c.tipX=lerp(seg.x1,seg.x2,f);c.tipY=lerp(seg.y1,seg.y2,f);ctx.lineTo(c.tipX,c.tipY);rem=0;}
        }
        ctx.stroke();
        if(!c.done){
          ctx.save();ctx.fillStyle='#fff';ctx.shadowColor='#4ade80';ctx.shadowBlur=16;ctx.globalAlpha=c.alpha;
          ctx.beginPath();ctx.arc(c.tipX,c.tipY,2.5,0,Math.PI*2);ctx.fill();ctx.restore();
        }
        ctx.restore();
      });
      return allDone;
    }

    /* ── letters ── */
    var TEXT='Ingeniería Comercial', letters=[], letterFont='', letterStartTime=0;
    var LETTER_DUR=380;
    function buildLetters(){
      letters=[];
      var tmp=document.createElement('canvas'),tc=tmp.getContext('2d');
      var cs=window.getComputedStyle(title);
      letterFont=cs.fontWeight+' '+cs.fontSize+' '+cs.fontFamily;
      tc.font=letterFont;
      var totalW=tc.measureText(TEXT).width;
      var startX=titleRect.left+(titleRect.width-totalW)/2;
      var midY=titleRect.top+titleRect.height/2;
      var cx=startX;
      for(var i=0;i<TEXT.length;i++){
        var ch=TEXT[i],cw=tc.measureText(ch).width;
        letters.push({char:ch,x:cx+cw/2,y:midY,w:cw,startDelay:i*55,startTime:-1,
          phase:'wait',t:0,opacity:0,scale:.85});
        cx+=cw;
      }
    }
    function updateDrawLetters(now){
      var allDone=true;
      ctx.save(); ctx.font=letterFont; ctx.textAlign='center'; ctx.textBaseline='middle';
      letters.forEach(function(l){
        if(l.phase==='wait'){
          if(now>=letterStartTime+l.startDelay){l.phase='animating';l.startTime=now;}
          else{allDone=false;return;}
        }
        if(l.phase==='animating'){
          allDone=false;
          var elapsed=now-l.startTime, t=clamp(elapsed/LETTER_DUR,0,1);
          var sc=t<.5?lerp(.85,1.12,easeOutCubic(t*2)):lerp(1.12,1.0,easeOutBack(clamp((t-.5)*2,0,1)));
          l.scale=sc; l.opacity=clamp(t*3,0,1);
          if(elapsed<32&&l.char.trim()!=='') spawnSparks(l.x,l.y,rndInt(3,5),false);
          if(t>=1){l.phase='done';l.opacity=1;l.scale=1;}
        }
        if(l.opacity>0){
          ctx.save(); ctx.globalAlpha=l.opacity; ctx.translate(l.x,l.y); ctx.scale(l.scale,l.scale);
          ctx.fillStyle='#fff'; ctx.shadowColor='rgba(74,222,128,.6)'; ctx.shadowBlur=l.phase==='animating'?18:0;
          ctx.fillText(l.char,0,0); ctx.restore();
        }
      });
      ctx.restore();
      return allDone;
    }

    /* ── burst ── */
    var burstFired=false;
    function fireBurst(){
      if(burstFired)return; burstFired=true;
      for(var i=0;i<40;i++) spawnSparks(titleRect.left+rnd(0,titleRect.width),titleRect.top+rnd(0,titleRect.height),1,true);
    }

    /* ── glow permanente en canvas ── */
    var glowT = 0;
    function drawTitleGlow() {
      glowT += 0.018;
      var pulse = (Math.sin(glowT) + 1) / 2;   // 0..1 suave
      var blur  = 8 + pulse * 22;               // 8..30
      var alpha = 0.45 + pulse * 0.35;          // 0.45..0.80

      ctx.save();
      ctx.font         = letterFont;
      ctx.textAlign    = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillStyle    = '#ffffff';
      ctx.shadowColor  = 'rgba(74,222,128,' + alpha + ')';
      ctx.shadowBlur   = blur;
      /* doble pasada para intensificar el glow */
      ctx.fillText(TEXT, titleRect.left + titleRect.width / 2, titleRect.top + titleRect.height / 2);
      ctx.shadowBlur   = blur * 0.5;
      ctx.fillText(TEXT, titleRect.left + titleRect.width / 2, titleRect.top + titleRect.height / 2);
      ctx.restore();
    }

    /* ── state machine — ONE SHOT ── */
    // phases: 'circuits' → 'letters' → 'burst' → 'glow'
    var phase='circuits', raf;

    function tick(now){
      ctx.clearRect(0,0,W,H);

      if(phase==='circuits'){
        var done=updateDrawCircuits(now);
        tickParticles();
        if(done){ phase='letters'; letterStartTime=now; buildLetters(); }

      } else if(phase==='letters'){
        /* fade circuits */
        var cElapsed=now-letterStartTime, cAlpha=clamp(1-cElapsed/400,0,1);
        if(cAlpha>0){ circuits.forEach(function(c){c.alpha=cAlpha;}); updateDrawCircuits(now); }
        var letDone=updateDrawLetters(now);
        tickParticles();
        if(letDone){ fireBurst(); phase='burst'; }

      } else if(phase==='burst'){
        updateDrawLetters(now);
        tickParticles();
        if(particles.length===0){
          phase='glow';
        }

      } else if(phase==='glow'){
        ctx.clearRect(0,0,W,H);
        drawTitleGlow();
      }

      raf=requestAnimationFrame(tick);
    }

    /* boot */
    setTimeout(function(){
      resize();
      circuitStartTime=performance.now()+50;
      buildCircuits();
      raf=requestAnimationFrame(tick);
    }, 350);

    window.addEventListener('resize', function(){ letterFont=''; resize(); });
  }

  if(document.readyState==='loading'){
    document.addEventListener('DOMContentLoaded',init);
  } else { init(); }
})();
</script>
