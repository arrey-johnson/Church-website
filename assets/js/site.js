(() => {
  const header = document.querySelector('[data-header]')
  const menu = document.querySelector('[data-menu]')
  const toggle = document.querySelector('[data-menu-toggle]')
  const closeBtn = document.querySelector('[data-menu-close]')
  const menuLabel = document.querySelector('[data-menu-label]')
  const menuIcon = document.querySelector('[data-menu-icon]')
  const labels = {
    open: menuLabel?.textContent || 'Menu',
    close: closeBtn?.getAttribute('aria-label') || 'Close',
  }

  function setMenu(open) {
    if (!menu || !toggle || !header) return
    menu.hidden = !open
    header.classList.toggle('is-menu-open', open)
    document.documentElement.classList.toggle('menu-open', open)
    document.body.style.overflow = open ? 'hidden' : ''
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false')
    if (menuLabel) menuLabel.textContent = open ? labels.close : labels.open
    if (menuIcon) {
      menuIcon.innerHTML = open
        ? '<path d="M2 2l14 8M2 10L16 2" stroke="currentColor" stroke-width="1.6" />'
        : '<path d="M1 1h16M1 6h16M1 11h10" stroke="currentColor" stroke-width="1.6" />'
    }
  }

  toggle?.addEventListener('click', () => setMenu(Boolean(menu?.hidden)))
  closeBtn?.addEventListener('click', () => setMenu(false))
  menu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setMenu(false)))

  const onScroll = () => {
    if (!header) return
    header.classList.toggle('is-scrolled', window.scrollY > 8)
  }
  onScroll()
  window.addEventListener('scroll', onScroll, { passive: true })

  document.querySelectorAll('[data-faq-item]').forEach((item) => {
    const button = item.querySelector('[data-faq-toggle]')
    const sign = item.querySelector('.sign')
    if (!button) return

    button.addEventListener('click', () => {
      const next = !item.classList.contains('is-open')
      document.querySelectorAll('[data-faq-item]').forEach((other) => {
        const isCurrent = other === item && next
        other.classList.toggle('is-open', isCurrent)
        other.querySelector('[data-faq-toggle]')?.setAttribute('aria-expanded', isCurrent ? 'true' : 'false')
        const otherSign = other.querySelector('.sign')
        if (otherSign) otherSign.textContent = isCurrent ? '–' : '+'
      })
    })
  })

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches
  if (!reduceMotion && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible')
            observer.unobserve(entry.target)
          }
        })
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    )
    document.querySelectorAll('.reveal').forEach((el) => observer.observe(el))
  } else {
    document.querySelectorAll('.reveal').forEach((el) => el.classList.add('is-visible'))
  }

  document.querySelectorAll('[data-ministry-form]').forEach((form) => {
    form.addEventListener('submit', (event) => {
      // Allow normal POST; enhance validation UX before leave.
      const data = new FormData(form)
      const kind = form.getAttribute('data-kind') || 'prayer'
      const name = String(data.get('name') || '').trim()
      const contact = String(data.get('contact') || '').trim()
      const bodyKey = kind === 'story' ? 'story' : kind === 'visit' ? 'message' : 'request'
      const body = String(data.get(bodyKey) || '').trim()
      const consent = data.get('consent') === 'on'
      const errorEl = form.querySelector('[data-form-error]')
      const successEl = form.querySelector('[data-form-success]')

      if (!name || !contact || !body || !consent) {
        event.preventDefault()
        if (errorEl) errorEl.hidden = false
        if (successEl) successEl.hidden = true
      }
    })
  })

  const searchInput = document.querySelector('[data-teach-search]')
  const chips = document.querySelectorAll('[data-teach-filter]')
  const cards = document.querySelectorAll('[data-teach-card]')
  const empty = document.querySelector('[data-teach-empty]')
  let kind = 'all'

  function filterTeachings() {
    if (!cards.length) return
    const needle = String(searchInput?.value || '')
      .trim()
      .toLowerCase()
    let visible = 0
    cards.forEach((card) => {
      const cardKind = card.getAttribute('data-kind') || ''
      const hay = (card.getAttribute('data-search') || '').toLowerCase()
      const matchKind = kind === 'all' || cardKind === kind
      const matchText = !needle || hay.includes(needle)
      const show = matchKind && matchText
      card.hidden = !show
      if (show) visible += 1
    })
    if (empty) empty.hidden = visible > 0
  }

  searchInput?.addEventListener('input', filterTeachings)
  chips.forEach((chip) => {
    chip.addEventListener('click', () => {
      kind = chip.getAttribute('data-teach-filter') || 'all'
      chips.forEach((c) => c.classList.toggle('active', c === chip))
      filterTeachings()
    })
  })

  const slider = document.querySelector('[data-hero-slider]')
  if (slider) {
    const slides = [...slider.querySelectorAll('[data-hero-slide]')]
    const dots = [...slider.querySelectorAll('[data-hero-dot]')]
    const progress = slider.querySelector('[data-hero-progress]')
    const duration = Number.parseFloat(getComputedStyle(slider).getPropertyValue('--hero-duration')) * 1000 || 6500
    let index = 0
    let timer = null
    const canAutoplay = !window.matchMedia('(prefers-reduced-motion: reduce)').matches

    function goTo(next) {
      if (!slides.length) return
      index = (next + slides.length) % slides.length
      slides.forEach((slide, i) => slide.classList.toggle('is-active', i === index))
      dots.forEach((dot, i) => {
        const active = i === index
        dot.classList.toggle('is-active', active)
        dot.setAttribute('aria-selected', active ? 'true' : 'false')
      })
      restartProgress()
    }

    function restartProgress() {
      if (!canAutoplay) return
      slider.classList.remove('is-playing')
      if (progress) void progress.offsetWidth
      slider.classList.add('is-playing')
    }

    function play() {
      if (!canAutoplay) return
      stop()
      restartProgress()
      timer = window.setInterval(() => goTo(index + 1), duration)
    }

    function stop() {
      if (timer) window.clearInterval(timer)
      timer = null
      slider.classList.remove('is-playing')
    }

    dots.forEach((dot) => {
      dot.addEventListener('click', () => {
        goTo(Number(dot.getAttribute('data-hero-dot') || 0))
        play()
      })
    })

    slider.addEventListener('mouseenter', stop)
    slider.addEventListener('mouseleave', play)
    slider.addEventListener('focusin', stop)
    slider.addEventListener('focusout', (event) => {
      if (!slider.contains(event.relatedTarget)) play()
    })
    document.addEventListener('visibilitychange', () => {
      if (document.hidden) stop()
      else play()
    })

    play()
  }
})()
