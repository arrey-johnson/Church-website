import { Link, useLocation } from 'react-router-dom'
import { useI18n } from '../i18n/context'

export function MobileCta() {
  const { t, to } = useI18n()
  const location = useLocation()

  if (location.pathname.includes('/prayer')) {
    return null
  }

  return (
    <div className="mobile-cta-bar">
      <Link className="btn btn-gold" to={to('prayer')}>
        {t.cta.prayer}
      </Link>
    </div>
  )
}
