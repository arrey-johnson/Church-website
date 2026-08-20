import { useEffect } from 'react'
import { useI18n } from '../i18n/context'

type SeoProps = {
  title?: string
  description?: string
}

export function Seo({ title, description }: SeoProps) {
  const { t } = useI18n()
  const pageTitle = title ?? t.meta.title
  const pageDescription = description ?? t.meta.description

  useEffect(() => {
    document.title = pageTitle
    const meta = document.querySelector('meta[name="description"]')
    if (meta) meta.setAttribute('content', pageDescription)
  }, [pageTitle, pageDescription])

  return null
}
