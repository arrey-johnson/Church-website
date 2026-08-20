import { useI18n } from '../i18n/context'

type Props = {
  kicker: string
  title: string
  lead?: string
  align?: 'left' | 'center'
}

export function PageHero({ kicker, title, lead, align = 'left' }: Props) {
  const { t } = useI18n()

  return (
    <header className={`page-hero${align === 'center' ? ' is-centered' : ''}`}>
      <div className="wrap">
        <p className="kicker hero-enter" style={{ ['--enter-delay' as string]: '0ms' }}>
          {kicker}
        </p>
        <h1 className="hero-enter" style={{ ['--enter-delay' as string]: '100ms' }}>
          {title}
        </h1>
        {lead ? (
          <p
            className="lead hero-enter"
            style={{ marginTop: '1rem', ['--enter-delay' as string]: '180ms' }}
          >
            {lead}
          </p>
        ) : null}
        <p className="draft-note hero-enter" style={{ ['--enter-delay' as string]: '260ms' }}>
          {t.common.draft}
        </p>
      </div>
    </header>
  )
}
