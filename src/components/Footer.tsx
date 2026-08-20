import { Link } from 'react-router-dom'
import { useI18n } from '../i18n/context'
import { LogoMark } from './LogoMark'

export function Footer() {
  const { t, to } = useI18n()
  const year = new Date().getFullYear()

  return (
    <footer className="footer">
      <div className="wrap footer-grid">
        <div className="footer-brand">
          <LogoMark className="logo-mark" title={t.media.altLogo} />
          <div>
            <p className="footer-brand-name">{t.brand.short}</p>
            <p className="footer-brand-line">{t.brand.line} {t.brand.ministry}</p>
            <p className="seal-note">{t.footer.tagline}</p>
          </div>
        </div>

        <div>
          <h3>{t.footer.pages}</h3>
          <ul>
            <li>
              <Link to={to()}>{t.nav.home}</Link>
            </li>
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
          </ul>
        </div>

        <div>
          <h3>{t.footer.connect}</h3>
          <ul>
            <li>
              <Link to={to('prayer')}>{t.nav.prayer}</Link>
            </li>
            <li>
              <Link to={to('testimonies')}>{t.nav.testimonies}</Link>
            </li>
            <li>
              <Link to={to('support')}>{t.nav.support}</Link>
            </li>
            <li>
              <Link to={to('privacy')}>{t.common.privacy}</Link>
            </li>
          </ul>
        </div>

        <div>
          <h3>{t.common.contact}</h3>
          <ul className="contact-links">
            <li>
              <a href={`mailto:${t.brand.email}`}>{t.brand.email}</a>
            </li>
            <li>
              <a href={t.brand.websiteUrl} target="_blank" rel="noreferrer">
                {t.brand.website}
              </a>
            </li>
            <li className="muted">{t.common.phonePending}</li>
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
