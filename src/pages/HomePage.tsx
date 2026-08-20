import { useI18n } from '../i18n/context'
import { site } from '../data/site'
import { Button } from '../components/Button'
import { FaqList } from '../components/FaqList'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function HomePage() {
  const { t, to, lang } = useI18n()

  const churchSchema = {
    '@context': 'https://schema.org',
    '@type': 'Church',
    name: t.brand.name,
    description: t.meta.description,
    url: site.website,
    email: site.email,
    image: site.logo,
    inLanguage: lang === 'fr' ? 'fr' : 'en',
  }

  const faqSchema = {
    '@context': 'https://schema.org',
    '@type': 'FAQPage',
    mainEntity: t.home.faqs.map((item) => ({
      '@type': 'Question',
      name: item.q,
      acceptedAnswer: { '@type': 'Answer', text: item.a },
    })),
  }

  return (
    <>
      <Seo />
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify(churchSchema) }}
      />
      <script
        type="application/ld+json"
        dangerouslySetInnerHTML={{ __html: JSON.stringify(faqSchema) }}
      />

      <section className="hero">
        <div className="wrap hero-grid">
          <div className="hero-copy">
            <p className="kicker hero-enter" style={{ ['--enter-delay' as string]: '0ms' }}>
              {t.home.eyebrow}
            </p>
            <p className="welcome hero-enter" style={{ ['--enter-delay' as string]: '80ms' }}>
              {t.home.welcome}
            </p>
            <h1 className="hero-enter" style={{ ['--enter-delay' as string]: '140ms' }}>
              {t.brand.name}
            </h1>
            <p className="hero-quote hero-enter" style={{ ['--enter-delay' as string]: '220ms' }}>
              {t.home.quote}
            </p>
            <p className="hero-support hero-enter" style={{ ['--enter-delay' as string]: '300ms' }}>
              {t.home.support}
            </p>
            <div className="hero-actions hero-enter" style={{ ['--enter-delay' as string]: '380ms' }}>
              <Button to={to('prayer')}>{t.cta.prayer}</Button>
              <Button to={to('new-here')} variant="line">
                {t.cta.visit}
              </Button>
            </div>
            <p className="draft-note hero-enter" style={{ ['--enter-delay' as string]: '460ms' }}>
              {t.common.confidential}
            </p>
          </div>
          <aside className="hero-panel hero-enter" style={{ ['--enter-delay' as string]: '280ms' }}>
            <img
              className="hero-panel-media"
              src={site.images.leader}
              alt={t.media.altLeader}
              decoding="async"
            />
            <img
              className="hero-panel-badge"
              src={site.logo}
              alt={t.media.altLogo}
              width={72}
              height={72}
              decoding="async"
            />
            <p>
              <strong>{t.common.confidential}</strong>
              {t.prayer.lead}
            </p>
          </aside>
        </div>
      </section>

      <section className="section">
        <div className="wrap split">
          <Reveal className="section-head">
            <p className="kicker">{t.home.problemKicker}</p>
            <h2>{t.home.problemTitle}</h2>
          </Reveal>
          <Reveal delay={120} variant="fade">
            <p className="lead">{t.home.problemBody}</p>
          </Reveal>
        </div>
      </section>

      <section className="section section-navy">
        <div className="wrap">
          <Reveal className="section-head">
            <p className="kicker">{t.home.solutionKicker}</p>
            <h2>{t.home.solutionTitle}</h2>
            <p className="lead" style={{ marginTop: '1rem' }}>
              {t.home.solutionBody}
            </p>
          </Reveal>
        </div>
      </section>

      <section className="section">
        <div className="wrap">
          <Reveal className="section-head">
            <p className="kicker">{t.home.benefitsKicker}</p>
            <h2>{t.home.benefitsTitle}</h2>
          </Reveal>
          <div className="benefit-grid">
            {t.home.benefits.map((item, index) => (
              <Reveal key={item.n} as="article" className="benefit" delay={index * 90}>
                <div className="num">{item.n}</div>
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
            <p className="kicker">{t.home.processKicker}</p>
            <h2>{t.home.processTitle}</h2>
          </Reveal>
          <div className="process">
            {t.home.process.map((item, index) => (
              <Reveal key={item.n} as="article" className="step" delay={index * 110} variant="scale">
                <div className="num">{item.n}</div>
                <h3>{item.title}</h3>
                <p className="muted">{item.body}</p>
              </Reveal>
            ))}
          </div>
        </div>
      </section>

      <section className="section">
        <div className="wrap split">
          <Reveal className="section-head">
            <p className="kicker">{t.home.proofKicker}</p>
            <h2>{t.home.proofTitle}</h2>
            <p className="lead" style={{ marginTop: '1rem' }}>
              {t.home.proofBody}
            </p>
            <div className="hero-actions">
              <Button to={to('testimonies')} variant="navy">
                {t.cta.story}
              </Button>
            </div>
          </Reveal>
          <Reveal delay={140} variant="left">
            <div className="info-card pending">
              <h3>{t.common.sample}</h3>
              <p className="muted">{t.testimonies.awaitBody}</p>
            </div>
          </Reveal>
        </div>
      </section>

      <section className="section">
        <div className="wrap split">
          <Reveal className="section-head">
            <p className="kicker">{t.home.faqKicker}</p>
            <h2>{t.home.faqTitle}</h2>
          </Reveal>
          <Reveal delay={100}>
            <FaqList items={t.home.faqs} />
          </Reveal>
        </div>
      </section>

      <section className="section">
        <div className="wrap">
          <Reveal variant="scale">
            <div className="cta-band">
              <div>
                <p className="kicker">{t.home.closeKicker}</p>
                <h2>{t.home.closeTitle}</h2>
                <p className="lead" style={{ marginTop: '0.8rem' }}>
                  {t.home.closeBody}
                </p>
              </div>
              <div className="actions">
                <Button to={to('prayer')}>{t.cta.prayer}</Button>
                <Button to={to('new-here')} variant="line">
                  {t.cta.visit}
                </Button>
                <Button to={to('teachings')} variant="ghost">
                  {t.common.readTeachings}
                </Button>
              </div>
            </div>
          </Reveal>
        </div>
      </section>
    </>
  )
}
