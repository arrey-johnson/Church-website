import { useI18n } from '../i18n/context'
import { Button } from '../components/Button'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function SupportPage() {
  const { t, to } = useI18n()

  return (
    <>
      <Seo title={`${t.nav.support} | ${t.brand.name}`} description={t.support.lead} />
      <PageHero
        kicker={t.support.kicker}
        title={t.support.title}
        lead={t.support.lead}
        align="center"
      />
      <section className="section">
        <div className="wrap">
          <Reveal className="section-head">
            <h2>{t.support.useTitle}</h2>
          </Reveal>
          <div className="benefit-grid">
            {t.support.uses.map((item, index) => (
              <Reveal key={item.title} as="article" className="soft-block" delay={index * 90}>
                <h3>{item.title}</h3>
                <p className="muted">{item.body}</p>
              </Reveal>
            ))}
          </div>
        </div>
      </section>
      <section className="section section-warm">
        <div className="wrap split">
          <Reveal>
            <h2>{t.support.giveTitle}</h2>
            <p className="lead" style={{ marginTop: '1rem' }}>
              {t.support.giveBody}
            </p>
            <p className="quiet-note">{t.support.giveNote}</p>
          </Reveal>
          <Reveal delay={120} as="article" className="info-card">
            <h3>{t.support.applyTitle}</h3>
            <p className="muted">{t.support.applyBody}</p>
            <div className="hero-actions">
              <Button to={to('prayer')} variant="navy">
                {t.cta.prayer}
              </Button>
            </div>
          </Reveal>
        </div>
      </section>
    </>
  )
}
