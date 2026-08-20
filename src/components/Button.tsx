import { Link } from 'react-router-dom'
import type { ButtonHTMLAttributes, ReactNode } from 'react'

type Variant = 'gold' | 'navy' | 'line' | 'ghost'

type Props = {
  children: ReactNode
  variant?: Variant
  to?: string
  href?: string
  className?: string
} & ButtonHTMLAttributes<HTMLButtonElement>

export function Button({
  children,
  variant = 'gold',
  to,
  href,
  className = '',
  type = 'button',
  ...rest
}: Props) {
  const classes = `btn btn-${variant} ${className}`.trim()

  if (to) {
    return (
      <Link className={classes} to={to}>
        {children}
      </Link>
    )
  }

  if (href) {
    return (
      <a className={classes} href={href}>
        {children}
      </a>
    )
  }

  return (
    <button className={classes} type={type} {...rest}>
      {children}
    </button>
  )
}
