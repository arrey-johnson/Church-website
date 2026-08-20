import { useI18n } from '../i18n/context'
import { MinistryForm } from '../components/MinistryForm'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function TestimoniesPage() {
  const { t } = useI18n()

  return (
    <>
      <Seo title={`${t.nav.testimonies} | ${t.brand.name}`} description={t.testimonies.lead} />
      <PageHero
        kicker={t.testimonies.kicker}
        title={t.testimonies.title}
        lead={t.testimonies.lead}
        align="center"
      />
      <section className="section">
        <div className="wrap">
          <Reveal className="section-head">
            <h2>{t.testimonies.policyTitle}</h2>
          </Reveal>
          <ul className="list-plain policy-list">
            {t.testimonies.policy.map((item) => (
              <li key={item}>{item}</li>
            ))}
          </ul>
          <p className="quiet-note">{t.testimonies.awaitBody}</p>
        </div>
      </section>
      <section className="section section-warm">
        <div className="wrap split">
          <Reveal className="section-head">
            <h2>{t.testimonies.formTitle}</h2>
            <p className="lead" style={{ marginTop: '1rem' }}>
              {t.testimonies.formLead}
            </p>
          </Reveal>
          <Reveal delay={120}>
            <MinistryForm kind="story" />
          </Reveal>
        </div>
      </section>
    </>
  )
}
