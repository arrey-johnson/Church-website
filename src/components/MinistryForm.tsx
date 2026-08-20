import { useState, type FormEvent } from 'react'
import { Link } from 'react-router-dom'
import { useI18n } from '../i18n/context'
import { Button } from './Button'

type FormKind = 'prayer' | 'visit' | 'story'

type Props = {
  kind: FormKind
}

export function MinistryForm({ kind }: Props) {
  const { t, to } = useI18n()
  const [status, setStatus] = useState<'idle' | 'error' | 'success'>('idle')
  const copy = t.prayer

  function onSubmit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault()
    const data = new FormData(event.currentTarget)
    const name = String(data.get('name') ?? '').trim()
    const contact = String(data.get('contact') ?? '').trim()
    const body = String(data.get(kind === 'story' ? 'story' : kind === 'visit' ? 'message' : 'request') ?? '').trim()
    const consent = data.get('consent') === 'on'

    if (!name || !contact || !body || !consent) {
      setStatus('error')
      return
    }

    setStatus('success')
    event.currentTarget.reset()
  }

  const success =
    kind === 'visit' ? copy.successVisit : kind === 'story' ? copy.successStory : copy.successPrayer
  const submit =
    kind === 'visit' ? copy.submitVisit : kind === 'story' ? copy.submitStory : copy.submitPrayer

  return (
    <form className="form-card" onSubmit={onSubmit} noValidate>
      <p className="kicker">{t.common.confidential}</p>
      {status === 'success' ? <p className="form-success">{success}</p> : null}
      {status === 'error' ? <p className="form-error">{t.common.error}</p> : null}

      <div className="form-grid" style={{ marginTop: '1rem' }}>
        <label>
          <span>
            {copy.fields.name} ({t.common.required})
          </span>
          <input name="name" autoComplete="name" placeholder={copy.placeholders.name} required />
        </label>
        <label>
          <span>
            {copy.fields.contact} ({t.common.required})
          </span>
          <input name="contact" autoComplete="email" placeholder={copy.placeholders.contact} required />
        </label>

        {kind === 'visit' ? (
          <>
            <label>
              <span>{copy.fields.visitMode}</span>
              <select name="mode" defaultValue="either">
                <option value="in-person">{copy.fields.inPerson}</option>
                <option value="online">{copy.fields.online}</option>
                <option value="either">{copy.fields.either}</option>
              </select>
            </label>
            <label>
              <span>
                {copy.fields.date} ({t.common.optional})
              </span>
              <input name="date" placeholder={copy.placeholders.date} />
            </label>
            <label>
              <span>
                {copy.fields.message} ({t.common.required})
              </span>
              <textarea name="message" placeholder={copy.placeholders.message} required />
            </label>
          </>
        ) : null}

        {kind === 'prayer' ? (
          <label>
            <span>
              {copy.fields.request} ({t.common.required})
            </span>
            <textarea name="request" placeholder={copy.placeholders.request} required />
          </label>
        ) : null}

        {kind === 'story' ? (
          <>
            <label>
              <span>
                {copy.fields.story} ({t.common.required})
              </span>
              <textarea name="story" placeholder={copy.placeholders.story} required />
            </label>
            <label>
              <span>
                {copy.fields.display} ({t.common.optional})
              </span>
              <input name="display" placeholder={copy.placeholders.display} />
            </label>
          </>
        ) : null}

        <label className="check">
          <input name="consent" type="checkbox" required />
          <span>
            {copy.fields.consent}{' '}
            <Link to={to('privacy')}>{t.common.privacy}</Link>
          </span>
        </label>

        <Button type="submit" variant="gold">
          {submit}
        </Button>
      </div>
    </form>
  )
}
