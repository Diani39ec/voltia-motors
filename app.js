/* VOLTIA Motors © 2026 Diana Trujillo — código original. Prohibida la reproducción. */
(function(){
  'use strict';
  const $=id=>document.getElementById(id);

  /* ---------- Protección anti-copia (disuasoria) ---------- */
  document.addEventListener('copy',e=>{
    const sel=window.getSelection().toString();
    if(sel&&sel.length>30){
      e.clipboardData.setData('text/plain',sel+'\n\n— Fuente: VOLTIA Motors © 2026 Diana Trujillo. Prohibida la reproducción.');
      e.preventDefault();
    }
  });
  document.addEventListener('dragstart',e=>{if(e.target.tagName==='IMG'||e.target.tagName==='SVG')e.preventDefault();});
  document.addEventListener('keydown',e=>{
    if((e.ctrlKey&&(e.key==='u'||e.key==='s'||e.key==='c'))&&!e.target.matches('input,textarea'))e.preventDefault();
    if(e.key==='F12')e.preventDefault();
  });
  console.log('%c© 2026 VOLTIA Motors · Diana Trujillo — Diseño original protegido.','color:#00e5ff;font-size:14px');

  /* ---------- Menú móvil ---------- */
  $('menu').onclick=()=>document.querySelector('.nav').classList.toggle('open');

  /* ---------- Modelos ---------- */
  const MODELS=[
    {n:'Voltia-One ⚡',t:'electrico',e:'🚗',p:'$34.990',f:['520 km autonomía','0–100 en 3,9 s','Carga 80% en 18 min']},
    {n:'Pulse Híbrido 🌿',t:'hibrido',e:'🚙',p:'$24.990',f:['900 km combinados','57 km/l','Ideal ciudad + carretera']},
    {n:'Terra 4x4 ⚡',t:'electrico',e:'🛻',p:'$42.990',f:['Tracción total','480 km autonomía','Sube donde sea']}
  ];
  const grid=$('grid');
  function paint(f){
    grid.innerHTML=MODELS.filter(m=>f==='all'||m.t===f).map(m=>
      `<article class="mcard" data-tilt><div class="emoji">${m.e}</div><h3>${m.n}</h3><p class="price">${m.p}</p><ul>${m.f.map(x=>`<li>${x}</li>`).join('')}</ul><a href="#prueba" class="btn neon">Probarlo</a></article>`).join('');
    grid.querySelectorAll('[data-tilt]').forEach(c=>{
      c.onmousemove=e=>{const r=c.getBoundingClientRect();
        c.style.transform=`perspective(700px) rotateY(${(e.clientX-r.left)/r.width*10-5}deg) rotateX(${5-(e.clientY-r.top)/r.height*10}deg)`;};
      c.onmouseleave=()=>c.style.transform='';
    });
  }
  paint('all');
  document.querySelectorAll('.chip').forEach(ch=>ch.onclick=()=>{
    document.querySelectorAll('.chip').forEach(x=>x.classList.remove('active'));
    ch.classList.add('active');paint(ch.dataset.f);});

  /* ---------- Configurador de color ---------- */
  document.querySelectorAll('.swatches button').forEach(b=>b.onclick=()=>{
    document.querySelectorAll('.swatches button').forEach(x=>x.classList.remove('sel'));
    b.classList.add('sel');
    document.documentElement.style.setProperty('--car',b.dataset.c);
    $('conf-body').style.fill=b.dataset.c;});

  /* ---------- Contadores ---------- */
  const io=new IntersectionObserver(es=>es.forEach(e=>{
    if(!e.isIntersecting)return;io.unobserve(e.target);
    const el=e.target,end=parseFloat(el.dataset.n),dec=+(el.dataset.dec||0);let t0=null;
    (function step(t){t0=t0||t;const p=Math.min(1,(t-t0)/1400);
      el.textContent=(end*p).toFixed(dec).replace('.',',');if(p<1)requestAnimationFrame(step);})(t0||performance.now());
  }),{threshold:.5});
  document.querySelectorAll('.count').forEach(el=>io.observe(el));

  /* ---------- Slider ---------- */
  const slides=[...document.querySelectorAll('.slide')],dots=[...document.querySelectorAll('.dot')];let si=0,timer;
  function go(i){si=(i+slides.length)%slides.length;
    slides.forEach((s,k)=>s.classList.toggle('active',k===si));
    dots.forEach((d,k)=>d.classList.toggle('active',k===si));}
  function auto(){clearInterval(timer);timer=setInterval(()=>go(si+1),4500);}
  dots.forEach((d,i)=>d.onclick=()=>{go(i);auto();});auto();

  /* ---------- Formulario ---------- */
  $('form').onsubmit=e=>{e.preventDefault();
    const n=$('nombre').value.trim(),t=$('tel').value.trim();
    if(n.length<2||t.length<6){$('ok').textContent='⚠️ Escribe tu nombre y un WhatsApp válido.';return;}
    $('ok').textContent=`✅ ¡Gracias ${n}! Te escribiremos al ${t} para tu prueba en el ${$('modelo').value}. ⚡`;
    e.target.querySelector('button').textContent='¡Agendado! 🎉';};
})();
