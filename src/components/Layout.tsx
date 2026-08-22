import { useEffect, useMemo } from 'react'
import { Navigate, Outlet, useParams } from 'react-router-dom'
import { defaultLang, isLang, messages } from '../i18n'
import { I18nContext } from '../i18n/context'
import { Footer } from './Footer'
import { Header } from './Header'
import { MobileCta } from './MobileCta'
import { PageFade } from './PageFade'

export function Layout() {
  const { lang } = useParams()
  const valid = isLang(lang)
  const resolved = valid ? lang : defaultLang
  const t = messages[resolved]
  const value = useMemo(
    () => ({
      lang: resolved,
      t,
      to: (page?: string) => (page ? `/${resolved}/${page}` : `/${resolved}`),
    }),
    [resolved, t],
  )

  useEffect(() => {
    document.documentElement.lang = resolved
  }, [resolved])

  if (!valid) {
    return <Navigate to={`/${defaultLang}`} replace />
  }

  return (
    <I18nContext.Provider value={value}>
      <a className="skip-link" href="#content">
        {t.common.skip}
      </a>
      <Header />
      <main id="content">
        <PageFade>
          <Outlet />
        </PageFade>
      </main>
      <MobileCta />
      <Footer />
    </I18nContext.Provider>
  )
}
