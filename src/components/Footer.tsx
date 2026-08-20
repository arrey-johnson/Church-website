import { Link } from 'react-router-dom'
import { useI18n } from '../i18n/context'
import { LogoMark } from './LogoMark'

export function Footer() {
  const { t, to } = useI18n()
  const year = new Date().getFullYear()

  return (
    <footer className="footer">
      <div className="wrap footer-grid">
        <div>
          <LogoMark className="logo-mark" title={t.brand.placeholderLogo} />
          <h2 style={{ margin: '1rem 0 0.6rem', fontSize: '1.6rem' }}>{t.brand.name}</h2>
          <p className="seal-note">{t.footer.tagline}</p>
          <p className="seal-note" style={{ marginTop: '0.8rem' }}>
            {t.brand.placeholderLogo}
          </p>
        </div>
        <div>
          <h3>{t.footer.pages}</h3>
          <ul>
            <li>
              <Link to={to('new-here')}>{t.nav.newHere}</Link>
            </li>
            <li>
              <Link to={to('vision')}>{t.nav.vision}</Link>
            </li>
            <li>
              <Link to={to('ministries')}>{t.nav.ministries}</Link>
            </li>
            <li>
              <Link to={to('teachings')}>{t.nav.teachings}</Link>
            </li>
            <li>
              <Link to={to('testimonies')}>{t.nav.testimonies}</Link>
            </li>
          </ul>
        </div>
        <div>
          <h3>{t.footer.connect}</h3>
          <ul>
            <li>
              <Link to={to('prayer')}>{t.nav.prayer}</Link>
            </li>
            <li>
              <Link to={to('support')}>{t.nav.support}</Link>
            </li>
            <li>
              <Link to={to('new-here')}>{t.cta.visit}</Link>
            </li>
            <li className="muted">{t.common.contactPending}</li>
          </ul>
        </div>
        <div>
          <h3>{t.footer.legal}</h3>
          <ul>
            <li>
              <Link to={to('privacy')}>{t.common.privacy}</Link>
            </li>
            <li className="muted">{t.footer.note}</li>
          </ul>
        </div>
      </div>
      <div className="wrap footer-bottom">
        <p>
          © {year} {t.footer.copyright}
        </p>
        <p>{t.footer.verify}</p>
      </div>
    </footer>
  )
}
