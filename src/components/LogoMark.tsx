import { site } from '../data/site'

type LogoProps = {
  className?: string
  title?: string
}

export function LogoMark({ className, title }: LogoProps) {
  return (
    <img
      className={className}
      src={site.logo}
      alt={title ?? site.name}
      width={72}
      height={72}
      decoding="async"
    />
  )
}
