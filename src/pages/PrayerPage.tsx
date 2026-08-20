import { useI18n } from '../i18n/context'
import { MinistryForm } from '../components/MinistryForm'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function PrayerPage() {
  const { t } = useI18n()

  return (
    <>
      <Seo title={`${t.nav.prayer} | ${t.brand.name}`} description={t.prayer.lead} />
      <PageHero kicker={t.prayer.kicker} title={t.prayer.title} lead={t.prayer.lead} />
      <section className="section">
        <div className="wrap split">
          <div style={{ display: 'grid', gap: '1rem' }}>
            <Reveal as="article" className="info-card">
              <h3>{t.common.confidential}</h3>
              <p className="muted">{t.prayer.timeframe}</p>
              <div className="contact-links" style={{ marginTop: '0.9rem' }}>
                <a href={`mailto:${t.brand.email}`}>{t.brand.email}</a>
                <a href={t.brand.websiteUrl} target="_blank" rel="noreferrer">
                  {t.brand.website}
                </a>
                <span className="muted">{t.common.phonePending}</span>
              </div>
            </Reveal>
            <Reveal as="article" className="info-card pending" delay={100}>
              <h3>{t.common.contact}</h3>
              <p>{t.prayer.emergency}</p>
            </Reveal>
          </div>
          <Reveal delay={140}>
            <MinistryForm kind="prayer" />
          </Reveal>
        </div>
      </section>
    </>
  )
}
