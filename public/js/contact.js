(function() {
  'use strict';

  function init() {
    initForm();
    initTopicBadges();
  }

  function initForm() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    form.querySelectorAll('input, select, textarea').forEach(field => {
      field.addEventListener('blur',  () => validateField(field));
      field.addEventListener('input', () => clearError(field));
    });

    form.addEventListener('submit', async e => {
      e.preventDefault();

      const fields = form.querySelectorAll('[required]');
      let isValid  = true;
      fields.forEach(f => { if (!validateField(f)) isValid = false; });
      if (!isValid) {
        if (window.showToast) showToast('Veuillez corriger les erreurs.', 'error');
        return;
      }

      const btn = form.querySelector('[type="submit"]');
      if (btn) { btn.disabled = true; btn.textContent = 'Envoi en cours...'; }

      try {
        const response = await fetch('/contact', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
          },
          body: JSON.stringify({
            prenom:  form.querySelector('#prenom')?.value.trim(),
            nom:     form.querySelector('#nom')?.value.trim(),
            email:   form.querySelector('#email')?.value.trim(),
            sujet:   form.querySelector('#sujet')?.value.trim(),
            message: form.querySelector('#message')?.value.trim(),
          })
        });

        const data = await response.json();

        if (data.success) {
          const successDiv = document.getElementById('form-success');
          if (successDiv) {
            form.style.display = 'none';
            successDiv.style.display = 'block';
            successDiv.classList.add('active');
          }
        } else {
          if (window.showToast) showToast("Erreur lors de l'envoi.", 'error');
        }
      } catch(err) {
        if (window.showToast) showToast('Erreur réseau.', 'error');
      } finally {
        if (btn) { btn.disabled = false; btn.textContent = 'Envoyer'; }
      }
    });
  }

  function validateField(input) {
    const value = input.type === 'checkbox' ? input.checked : input.value.trim();
    if (input.hasAttribute('required') && !value) {
      markError(input, 'Ce champ est obligatoire.');
      return false;
    }
    if (input.type === 'email' && value) {
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
        markError(input, 'Adresse e-mail invalide.');
        return false;
      }
    }
    if (input.id === 'message' && value && value.length < 10) {
      markError(input, 'Le message doit contenir au moins 10 caractères.');
      return false;
    }
    clearError(input);
    return true;
  }

  function markError(input, msg) {
    input.classList.add('error');
    input.style.borderColor = 'var(--rouge)';
    input.style.boxShadow   = '0 0 0 3px var(--rouge-light)';
    let err = input.parentElement.querySelector('.field-error');
    if (!err) {
      err = document.createElement('span');
      err.className = 'field-error';
      err.style.cssText = 'color:var(--rouge);font-size:12px;margin-top:4px;display:block';
      input.parentElement.appendChild(err);
    }
    err.textContent = msg;
  }

  function clearError(input) {
    input.classList.remove('error');
    input.style.borderColor = '';
    input.style.boxShadow   = '';
    const err = input.parentElement?.querySelector('.field-error');
    if (err) err.textContent = '';
  }

  function initTopicBadges() {
    document.querySelectorAll('.contact-topics-tags .badge').forEach(badge => {
      badge.addEventListener('click', () => {
        const sujetSelect = document.getElementById('sujet');
        if (!sujetSelect) return;
        const map = {
          'Données régions':   'donnees',
          'Photos manquantes': 'photos',
          'Suggestions':       'suggestion',
          'Correction erreur': 'donnees',
          'Nouveau site':      'suggestion',
          'Bug technique':     'bug',
        };
        const val = map[badge.textContent.trim()];
        if (val) sujetSelect.value = val;
        const form = document.getElementById('contact-form');
        if (form) form.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
