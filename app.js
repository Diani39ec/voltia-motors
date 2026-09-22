/* VOLTIA Motors */
(function(){
  'use strict';
  const $=id=>document.getElementById(id);

  /* ---------- Protección (disuasoria) ---------- */
  document.addEventListener('dragstart',e=>{if(e.target.tagName==='IMG'||e.target.tagName==='SVG')e.preventDefault();});
  document.addEventListener('keydown',e=>{
    if((e.ctrlKey&&(e.key==='u'||e.key==='s'||e.key==='c'))&&!e.target.matches('input,textarea'))e.preventDefault();
    if(e.key==='F12')e.preventDefault();
  });
  console.log('%cVOLTIA Motors ⚡','color:#00e5ff;font-size:14px');

  /* ---------- Menú móvil ---------- */
  $('menu').onclick=()=>document.querySelector('.nav').classList.toggle('open');

  /* ---------- Modelos ---------- */
  const U='https://images.unsplash.com/';
  const Q='?q=80&w=900&auto=format&fit=crop';
  const MODELS=[
    {n:'Voltia-One ⚡',t:'electrico',img:U+'photo-1552519507-da3b142c6e3d'+Q,alt:'Deportivo azul en el desierto',km:'520 km',p:'$34.990',f:['520 km autonomía','0–100 en 3,9 s','Carga 80% en 18 min']},
    {n:'Pulse Híbrido 🌿',t:'hibrido',img:U+'photo-1503376780353-7e6692767b70'+Q,alt:'Sedán negro en movimiento en carretera',km:'900 km',p:'$24.990',f:['900 km combinados','57 km/l','Ideal ciudad + carretera']},
    {n:'Terra 4x4 ⚡',t:'electrico',img:U+'photo-1533473359331-0135ef1b58bf'+Q,alt:'SUV blanca todoterreno',km:'480 km',p:'$42.990',f:['Tracción total','480 km autonomía','Sube donde sea']}
  ];
  const FALLBACK=U+'photo-1494976388531-d1058494cdd8'+Q;
  // Modelos profesionales: intenta la API PHP/MySQL y usa el respaldo local si falla
  fetch('api/modelos.php').then(r=>r.json()).then(d=>{
    if(d.ok&&d.modelos&&d.modelos.length){
      d.modelos.forEach((m,i)=>{ if(MODELS[i]){ MODELS[i].n=m.nombre; MODELS[i].t=m.tipo; MODELS[i].p=m.precio; MODELS[i].img=m.foto_url; MODELS[i].alt=m.foto_alt; }});
      const act=document.querySelector('.chip.active');
      paint(act?act.dataset.f:'all');
    }
  }).catch(()=>{});
  const grid=$('grid');
  function paint(f){
    grid.innerHTML=MODELS.filter(m=>f==='all'||m.t===f).map(m=>
      `<article class="mcard" data-tilt><div class="foto"><img src="${m.img}" alt="${m.alt}" loading="lazy" draggable="false" onerror="this.onerror=null;this.src='${FALLBACK}'"><span class="shine"></span><span class="km">⚡ ${m.km}</span></div><h3>${m.n}</h3><p class="price">${m.p}</p><ul>${m.f.map(x=>`<li>${x}</li>`).join('')}</ul><a href="#prueba" class="btn neon">Probarlo</a></article>`).join('');
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

  /* ---------- Configurador: plato + modelo + tono ---------- */
  const confFoto=$('conf-foto');
  confFoto.onerror=()=>{confFoto.onerror=null;confFoto.src=FALLBACK;};
  document.querySelectorAll('.mbtn').forEach(b=>b.onclick=()=>{
    document.querySelectorAll('.mbtn').forEach(x=>x.classList.remove('sel'));
    b.classList.add('sel');
    confFoto.style.opacity=0;
    setTimeout(()=>{confFoto.src=MODELS[+b.dataset.m].img;confFoto.onload=()=>confFoto.style.opacity=1;},250);});
  confFoto.style.transition='opacity .25s';
  document.querySelectorAll('.swatches button').forEach(b=>b.onclick=()=>{
    document.querySelectorAll('.swatches button').forEach(x=>x.classList.remove('sel'));
    b.classList.add('sel');
    confFoto.style.filter=b.hasAttribute('data-bn')?'grayscale(1) brightness(1.15)':`hue-rotate(${b.dataset.h}) saturate(1.3)`;});

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

  /* ---------- Formulario → backend PHP (fetch + degradado a POST normal) ---------- */
  const form=$('form');
  form.addEventListener('submit',e=>{
    const n=$('nombre').value.trim(),t=$('tel').value.trim();
    if(n.length<2||t.length<6){$('ok').textContent='⚠️ Escribe tu nombre y un WhatsApp válido.';e.preventDefault();return;}
    if(!window.fetch)return; // sin fetch: el navegador hace el POST clásico
    e.preventDefault();
    $('ok').textContent='⏳ Enviando…';
    fetch(form.action,{method:'POST',body:new FormData(form)}).then(r=>r.json()).then(d=>{
      $('ok').textContent=(d.ok?'✅ ':'⚠️ ')+d.msg;
      if(d.ok)form.querySelector('button').textContent='¡Agendado! 🎉';
    }).catch(()=>{$('ok').textContent='⚠️ Sin conexión, inténtalo de nuevo.';});
  });
})();
