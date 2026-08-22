import { Link, useParams } from 'react-router-dom'
import { defaultLang, isLang, messages } from '../i18n'

export function NotFoundPage() {
  const { lang } = useParams()
  const resolved = isLang(lang) ? lang : defaultLang
  const t = messages[resolved]

  return (
    <div className="not-found">
      <div className="wrap">
        <p className="kicker">404</p>
        <h1>{t.notFound.title}</h1>
        <p className="lead" style={{ marginTop: '1rem' }}>
          {t.notFound.body}
        </p>
        <p style={{ marginTop: '1.4rem' }}>
          <Link to={`/${resolved}`}>{t.common.backHome}</Link>
        </p>
      </div>
    </div>
  )
}
