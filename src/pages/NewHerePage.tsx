import { useI18n } from '../i18n/context'
import { Button } from '../components/Button'
import { MinistryForm } from '../components/MinistryForm'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function NewHerePage() {
  const { t, to } = useI18n()

  return (
    <>
      <Seo title={`${t.nav.newHere} | ${t.brand.name}`} description={t.newHere.lead} />
      <PageHero kicker={t.newHere.kicker} title={t.newHere.title} lead={t.newHere.lead} />
      <section className="section">
        <div className="wrap">
          <Reveal className="section-head">
            <h2>{t.newHere.expectTitle}</h2>
          </Reveal>
          <div className="benefit-grid">
            {t.newHere.expect.map((item, index) => (
              <Reveal key={item.title} as="article" className="soft-block" delay={index * 90}>
                <h3>{item.title}</h3>
                <p className="muted">{item.body}</p>
              </Reveal>
            ))}
          </div>
        </div>
      </section>
      <section className="section section-warm">
        <div className="wrap">
          <Reveal className="section-head">
            <h2>{t.newHere.practicalTitle}</h2>
            <p className="lead" style={{ marginTop: '0.85rem' }}>
              {t.newHere.practicalLead}
            </p>
          </Reveal>
          <div className="detail-list">
            <Reveal as="article" className="soft-block" delay={0}>
              <h3>{t.newHere.timesLabel}</h3>
              <p className="muted">{t.newHere.timesBody}</p>
            </Reveal>
            <Reveal as="article" className="soft-block" delay={80}>
              <h3>{t.newHere.placeLabel}</h3>
              <p className="muted">{t.newHere.placeBody}</p>
            </Reveal>
            <Reveal as="article" className="soft-block" delay={160}>
              <h3>{t.newHere.onlineLabel}</h3>
              <p className="muted">{t.newHere.onlineBody}</p>
              <div className="contact-links" style={{ marginTop: '0.8rem' }}>
                <a href={`mailto:${t.brand.email}`}>{t.brand.email}</a>
                <a href={t.brand.websiteUrl} target="_blank" rel="noreferrer">
                  {t.brand.website}
                </a>
              </div>
            </Reveal>
          </div>
          <div className="hero-actions" style={{ marginTop: '1.6rem' }}>
            <Button to={to('prayer')} variant="navy">
              {t.cta.prayer}
            </Button>
          </div>
        </div>
      </section>
      <section className="section">
        <div className="wrap split">
          <Reveal className="section-head">
            <h2>{t.newHere.visitTitle}</h2>
            <p className="lead" style={{ marginTop: '1rem' }}>
              {t.newHere.visitLead}
            </p>
          </Reveal>
          <Reveal delay={120}>
            <MinistryForm kind="visit" />
          </Reveal>
        </div>
      </section>
    </>
  )
}
