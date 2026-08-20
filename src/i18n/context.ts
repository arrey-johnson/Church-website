import { createContext, useContext } from 'react'
import type { Lang, Messages } from '../i18n'

export type I18nContextValue = {
  lang: Lang
  t: Messages
  to: (page?: string) => string
}

export const I18nContext = createContext<I18nContextValue | null>(null)

export function useI18n() {
  const value = useContext(I18nContext)
  if (!value) {
    throw new Error('useI18n must be used within the language layout')
  }
  return value
}
