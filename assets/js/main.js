// Frontend-only demo logic (no backend). Keeps users in localStorage for demo purposes.
const toast = id => {const t = document.getElementById('toast'); t.textContent = id; t.classList.add('show'); setTimeout(()=>t.classList.remove('show'),3000)}

function togglePassword(id){const el=document.getElementById(id); if(!el) return; el.type = el.type === 'password' ? 'text' : 'password'}

/* Google Sign-In callback — decodes the JWT credential token */
function handleGoogleSignIn(response){
  // response.credential is a JWT token from Google
  const payload = JSON.parse(atob(response.credential.split('.')[1]));
  const name = payload.name || 'User';
  const email = payload.email || '';
  toast('Welcome, ' + name + '!');
  // Demo: store in localStorage and show info
  const users = getUsers();
  if(!users.find(u => u.email === email)){
    users.push({name, email, password: '(google-auth)'}); saveUsers(users);
  }
  setTimeout(()=>{ alert('Google Sign-In success!\\n\\nName: ' + name + '\\nEmail: ' + email + '\\n\\n(Demo only — connect your backend for production)'); }, 500);
}
// expose globally for GSI callback
window.handleGoogleSignIn = handleGoogleSignIn;

// Simple client-side user store (for demo only)
function getUsers(){try{return JSON.parse(localStorage.getItem('anexg_users')||'[]')}catch(e){return []}}
function saveUsers(users){localStorage.setItem('anexg_users', JSON.stringify(users))}

function handleSignup(e){e.preventDefault(); const name = document.getElementById('fullName').value.trim(); const email = document.getElementById('signupEmail').value.trim().toLowerCase(); const password = document.getElementById('signupPassword').value; const confirm = document.getElementById('confirmPassword').value;
  if(password !== confirm){toast('Passwords do not match'); return}
  if(password.length < 8){toast('Password too short'); return}
  const users = getUsers(); if(users.find(u=>u.email===email)){toast('Email already registered'); return}
  users.push({name,email,password}); saveUsers(users); toast('Account created — demo only'); setTimeout(()=>{window.location.href='login.php'},700)}

function handleLogin(e){e.preventDefault(); const email = document.getElementById('loginEmail').value.trim().toLowerCase(); const password = document.getElementById('loginPassword').value; const users = getUsers(); const user = users.find(u=>u.email===email && u.password===password);
  if(!user){toast('Invalid credentials (demo)'); return}
  toast('Welcome, '+user.name); // demo success — redirect to a placeholder
  setTimeout(()=>{alert('Demo: Logged in as '+user.email+' (no backend).');},400)
}

// Attach forms if present (in case script loads before DOM)
document.addEventListener('DOMContentLoaded',()=>{
  const sForm = document.getElementById('signupForm'); if(sForm) sForm.addEventListener('submit', handleSignup);
  const lForm = document.getElementById('loginForm'); if(lForm) lForm.addEventListener('submit', handleLogin);

  // add entrance animation
  document.querySelectorAll('.card.animated-card').forEach((c,i)=>setTimeout(()=>c.classList.add('show'), 120 + (i*80)));

  // floating label input handling
  document.querySelectorAll('.input-group input').forEach(input=>{
    // toggle class on input to keep label floated after autofill or paste
    const check = ()=> input.dispatchEvent(new Event('input'));
    input.addEventListener('input', check);
    // initial check
    if(input.value && input.value.length) input.dispatchEvent(new Event('input'));
  });

  // parallax blobs effect
  const blobs = document.querySelector('.blobs');
  if(blobs){
    window.addEventListener('mousemove', e=>{
      const x = (e.clientX - window.innerWidth/2) / 40;
      const y = (e.clientY - window.innerHeight/2) / 40;
      blobs.style.transform = `translate(${x}px, ${y}px)`;
    });
  }

  // init particles
  if(typeof(initParticles) === 'function') initParticles();
});


/* Simple canvas particle system for atmospheric background */
(function(){
  const canvas = document.getElementById('particles');
  let ctx, particles = [], W, H, raf;

  function onResize(){ if(!canvas) return; W = canvas.width = innerWidth; H = canvas.height = innerHeight; }

  class P{ constructor(){ this.reset(); }
    reset(){ this.x = Math.random()*W; this.y = Math.random()*H; this.vx = (Math.random()-0.5)*0.4; this.vy = (Math.random()-0.5)*0.4; this.r = 0.6 + Math.random()*1.8; this.life = 40 + Math.random()*80; this.max = this.life }
    step(){ this.x += this.vx; this.y += this.vy; this.life--; if(this.x<-20||this.x>W+20||this.y<-20||this.y>H+20||this.life<=0) this.reset(); }
    draw(ctx){ const p = (1 - this.life/this.max); ctx.beginPath(); ctx.fillStyle = `rgba(0,229,255,${0.08 + p*0.12})`; ctx.arc(this.x,this.y,this.r,0,Math.PI*2); ctx.fill(); }
  }

  window.initParticles = function(){ if(!canvas) return; ctx = canvas.getContext('2d'); onResize(); window.addEventListener('resize', onResize);
    particles = Array.from({length: Math.floor((innerWidth*innerHeight)/125000)}, ()=> new P());
    (function loop(){ if(!ctx) return; ctx.clearRect(0,0,W,H);
      // subtle backdrop
      for(const p of particles){ p.step(); p.draw(ctx); }
      raf = requestAnimationFrame(loop);
    })();
  }
})();

/* End of enhancements */
