import { useState } from 'react'
import { useI18n } from '../i18n/context'

type Faq = {
  q: string
  a: string
}

export function FaqList({ items }: { items: readonly Faq[] }) {
  const { t } = useI18n()
  const [open, setOpen] = useState(0)

  return (
    <div className="faq-list">
      {items.map((item, index) => {
        const isOpen = open === index
        return (
          <div className={`faq-item${isOpen ? ' is-open' : ''}`} key={item.q}>
            <button
              type="button"
              aria-expanded={isOpen}
              onClick={() => setOpen(isOpen ? -1 : index)}
            >
              <strong>{item.q}</strong>
              <span className="sign" aria-hidden="true">
                {isOpen ? '–' : '+'}
              </span>
            </button>
            <div className="answer-wrap" aria-hidden={!isOpen}>
              <p className="answer">{item.a}</p>
            </div>
          </div>
        )
      })}
      <p className="draft-note">{t.common.draft}</p>
    </div>
  )
}
