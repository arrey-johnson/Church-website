import { useI18n } from '../i18n/context'
import { Button } from '../components/Button'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function VisionPage() {
  const { t, to } = useI18n()

  return (
    <>
      <Seo title={`${t.nav.vision} | ${t.brand.name}`} description={t.vision.lead} />
      <PageHero
        kicker={t.vision.kicker}
        title={t.vision.title}
        lead={t.vision.lead}
        align="center"
      />
      <section className="section section-navy">
        <div className="wrap">
          <Reveal>
            <p className="kicker">{t.vision.missionKicker}</p>
            <h2>{t.vision.missionTitle}</h2>
            <p className="lead" style={{ marginTop: '1rem', maxWidth: '46rem' }}>
              {t.vision.mission}
            </p>
          </Reveal>
        </div>
      </section>
      <section className="section">
        <div className="wrap">
          <Reveal className="section-head">
            <p className="kicker">{t.vision.beliefsKicker}</p>
            <h2>{t.vision.beliefsTitle}</h2>
          </Reveal>
          <div className="benefit-grid">
            {t.vision.beliefs.map((item, index) => (
              <Reveal key={item.title} as="article" className="soft-block" delay={index * 70}>
                <div className="num">{String(index + 1).padStart(2, '0')}</div>
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
            <p className="kicker">{t.vision.leadKicker}</p>
            <h2>{t.vision.leadTitle}</h2>
            <p className="lead" style={{ marginTop: '1rem' }}>
              {t.vision.leadBody}
            </p>
          </Reveal>
          <Reveal delay={120} as="article" className="info-card">
            <h3>{t.vision.govTitle}</h3>
            <p>{t.vision.govBody}</p>
            <div className="contact-links" style={{ marginTop: '0.9rem' }}>
              <a href={`mailto:${t.brand.email}`}>{t.brand.email}</a>
              <a href={t.brand.websiteUrl} target="_blank" rel="noreferrer">
                {t.brand.website}
              </a>
            </div>
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
