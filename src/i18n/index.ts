import { en, type Messages } from './en'
import { fr } from './fr'

export const langs = ['en', 'fr'] as const
export type Lang = (typeof langs)[number]
export type { Messages }

export const messages: Record<Lang, Messages> = { en, fr }

export function isLang(value: string | undefined): value is Lang {
  return value === 'en' || value === 'fr'
}
