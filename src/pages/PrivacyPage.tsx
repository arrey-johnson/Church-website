import { useI18n } from '../i18n/context'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function PrivacyPage() {
  const { t } = useI18n()

  return (
    <>
      <Seo title={`${t.common.privacy} | ${t.brand.name}`} description={t.privacy.lead} />
      <PageHero kicker={t.privacy.kicker} title={t.privacy.title} lead={t.privacy.lead} />
      <section className="section">
        <div className="wrap" style={{ display: 'grid', gap: '1rem' }}>
          {t.privacy.sections.map((item, index) => (
            <Reveal key={item.title} as="article" className="card" delay={index * 70}>
              <h3>{item.title}</h3>
              <p className="muted">{item.body}</p>
            </Reveal>
          ))}
        </div>
      </section>
    </>
  )
}
