import { en, type Messages } from './en'
import { fr } from './fr'

export const langs = ['fr', 'en'] as const
export type Lang = (typeof langs)[number]
export type { Messages }

export const defaultLang: Lang = 'fr'

export const messages: Record<Lang, Messages> = { fr, en }

export function isLang(value: string | undefined): value is Lang {
  return value === 'en' || value === 'fr'
}
