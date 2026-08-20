import { useEffect, useState } from 'react'
import { Link, NavLink, useLocation, useNavigate } from 'react-router-dom'
import { langs, type Lang } from '../i18n'
import { useI18n } from '../i18n/context'
import { Button } from './Button'
import { LogoMark } from './LogoMark'

const pages = [
  ['new-here', 'newHere'],
  ['vision', 'vision'],
  ['ministries', 'ministries'],
  ['teachings', 'teachings'],
  ['testimonies', 'testimonies'],
  ['prayer', 'prayer'],
  ['support', 'support'],
] as const

export function Header() {
  const { lang, t, to } = useI18n()
  const location = useLocation()
  const navigate = useNavigate()
  const [open, setOpen] = useState(false)
  const [scrolled, setScrolled] = useState(false)

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 8)
    onScroll()
    window.addEventListener('scroll', onScroll, { passive: true })
    return () => window.removeEventListener('scroll', onScroll)
  }, [])

  useEffect(() => {
    setOpen(false)
  }, [location.pathname])

  useEffect(() => {
    document.body.style.overflow = open ? 'hidden' : ''
    return () => {
      document.body.style.overflow = ''
    }
  }, [open])

  function switchLang(next: Lang) {
    const parts = location.pathname.split('/')
    parts[1] = next
    navigate(parts.join('/') || `/${next}`)
  }

  return (
    <header className={`header${scrolled ? ' is-scrolled' : ''}`}>
      <div className="wrap-wide header-inner">
        <Link className="logo" to={to()} aria-label={t.brand.name}>
          <LogoMark className="logo-mark" title={t.brand.placeholderLogo} />
          <span className="logo-text">
            <strong>{t.brand.short}</strong>
            <span>{t.brand.line}</span>
          </span>
        </Link>

        <nav className="nav-desktop" aria-label={t.brand.name}>
          <NavLink to={to()} end>
            {t.nav.home}
          </NavLink>
          {pages.map(([slug, key]) => (
            <NavLink key={slug} to={to(slug)}>
              {t.nav[key]}
            </NavLink>
          ))}
        </nav>

        <div className="header-tools">
          <div className="lang-switch" role="group" aria-label="Language">
            {langs.map((item) => (
              <button
                key={item}
                type="button"
                className={item === lang ? 'active' : undefined}
                onClick={() => switchLang(item)}
              >
                {item.toUpperCase()}
              </button>
            ))}
          </div>
          <span className="header-cta">
            <Button to={to('prayer')} variant="gold">
              {t.cta.prayer}
            </Button>
          </span>
          <button
            className="icon-btn menu-toggle"
            type="button"
            aria-expanded={open}
            aria-controls="mobile-menu"
            onClick={() => setOpen((value) => !value)}
          >
            <span className="visually-hidden">{open ? t.common.close : t.common.menu}</span>
            <svg width="18" height="12" viewBox="0 0 18 12" aria-hidden="true">
              {open ? (
                <path d="M2 2l14 8M2 10L16 2" stroke="currentColor" strokeWidth="1.6" />
              ) : (
                <path d="M1 1h16M1 6h16M1 11h10" stroke="currentColor" strokeWidth="1.6" />
              )}
            </svg>
          </button>
        </div>
      </div>

      {open ? (
        <div className="menu-overlay" id="mobile-menu">
          <nav>
            <NavLink to={to()} end>
              {t.nav.home}
              <span>01</span>
            </NavLink>
            {pages.map(([slug, key], index) => (
              <NavLink key={slug} to={to(slug)}>
                {t.nav[key]}
                <span>{String(index + 2).padStart(2, '0')}</span>
              </NavLink>
            ))}
          </nav>
          <div className="menu-cta">
            <Button to={to('prayer')} variant="gold">
              {t.cta.prayer}
            </Button>
            <Button to={to('new-here')} variant="line">
              {t.cta.visit}
            </Button>
          </div>
        </div>
      ) : null}
    </header>
  )
}
