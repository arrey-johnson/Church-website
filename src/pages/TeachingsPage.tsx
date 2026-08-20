import { useMemo, useState } from 'react'
import { useI18n } from '../i18n/context'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

const kinds = ['all', 'video', 'audio', 'article'] as const

export function TeachingsPage() {
  const { t } = useI18n()
  const [query, setQuery] = useState('')
  const [kind, setKind] = useState<(typeof kinds)[number]>('all')

  const items = useMemo(() => {
    const needle = query.trim().toLowerCase()
    return t.teachings.items.filter((item) => {
      const matchesKind = kind === 'all' || item.kind === kind
      const haystack = `${item.title} ${item.theme} ${item.excerpt}`.toLowerCase()
      return matchesKind && haystack.includes(needle)
    })
  }, [kind, query, t.teachings.items])

  return (
    <>
      <Seo title={`${t.nav.teachings} | ${t.brand.name}`} description={t.teachings.lead} />
      <PageHero kicker={t.teachings.kicker} title={t.teachings.title} lead={t.teachings.lead} />
      <section className="section">
        <div className="wrap">
          <Reveal className="search-row">
            <input
              value={query}
              onChange={(event) => setQuery(event.target.value)}
              placeholder={t.teachings.search}
              aria-label={t.teachings.search}
            />
            <div className="chips" role="group" aria-label={t.teachings.search}>
              {kinds.map((item) => (
                <button
                  key={item}
                  type="button"
                  className={item === kind ? 'active' : undefined}
                  onClick={() => setKind(item)}
                >
                  {t.teachings.filters[item]}
                </button>
              ))}
            </div>
          </Reveal>
          {items.length === 0 ? <p className="muted">{t.teachings.empty}</p> : null}
          <div className="teach-grid">
            {items.map((item, index) => (
              <Reveal key={item.id} as="article" className="card" delay={index * 70}>
                <span className="badge">{item.kind}</span>
                <h3 style={{ marginTop: '0.85rem' }}>{item.title}</h3>
                <p className="muted">{item.excerpt}</p>
                <p className="muted" style={{ marginTop: '0.9rem', fontSize: '0.88rem' }}>
                  {item.theme} · {t.teachings.speakerPending} · {t.teachings.datePending}
                </p>
              </Reveal>
            ))}
          </div>
        </div>
      </section>
    </>
  )
}
