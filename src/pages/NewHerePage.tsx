import { useI18n } from '../i18n/context'
import { MinistryForm } from '../components/MinistryForm'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function NewHerePage() {
  const { t } = useI18n()

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
              <Reveal key={item.title} as="article" className="card" delay={index * 90}>
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
          </Reveal>
          <div className="card-grid">
            <Reveal as="article" className="info-card pending" delay={0}>
              <h3>{t.newHere.timesLabel}</h3>
              <p>{t.newHere.timesBody}</p>
              <p className="muted" style={{ marginTop: '0.7rem' }}>
                {t.common.schedulePending}
              </p>
            </Reveal>
            <Reveal as="article" className="info-card pending" delay={90}>
              <h3>{t.newHere.placeLabel}</h3>
              <p>{t.newHere.placeBody}</p>
              <p className="muted" style={{ marginTop: '0.7rem' }}>
                {t.common.locationPending}
              </p>
            </Reveal>
            <Reveal as="article" className="info-card" delay={180}>
              <h3>{t.newHere.onlineLabel}</h3>
              <p className="muted">{t.newHere.onlineBody}</p>
            </Reveal>
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
