import { useI18n } from '../i18n/context'
import { Button } from '../components/Button'
import { PageHero } from '../components/PageHero'
import { Reveal } from '../components/Reveal'
import { Seo } from '../components/Seo'

export function MinistriesPage() {
  const { t, to } = useI18n()

  return (
    <>
      <Seo title={`${t.nav.ministries} | ${t.brand.name}`} description={t.ministries.lead} />
      <PageHero kicker={t.ministries.kicker} title={t.ministries.title} lead={t.ministries.lead} />
      <section className="section">
        <div className="wrap" style={{ display: 'grid', gap: '1rem' }}>
          {t.ministries.items.map((item, index) => (
            <Reveal
              key={item.id}
              as="article"
              className="ministry-row"
              delay={index * 80}
              variant="left"
            >
              <div className="num">{String(index + 1).padStart(2, '0')}</div>
              <div>
                <h3>{item.title}</h3>
                <p>{item.body}</p>
              </div>
              <Button to={to(item.to)} variant={index % 2 === 0 ? 'gold' : 'navy'}>
                {item.cta}
              </Button>
            </Reveal>
          ))}
        </div>
      </section>
    </>
  )
}
