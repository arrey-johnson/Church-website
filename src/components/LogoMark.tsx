type LogoProps = {
  className?: string
  title?: string
}

export function LogoMark({ className, title }: LogoProps) {
  return (
    <svg
      className={className}
      viewBox="0 0 72 72"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
      role="img"
      aria-label={title}
    >
      {title ? <title>{title}</title> : null}
      <rect width="72" height="72" rx="18" fill="#1E3A8A" />
      <circle cx="36" cy="36" r="24" stroke="#D4AF37" strokeWidth="1.4" />
      <circle cx="36" cy="36" r="17.5" stroke="#D4AF37" strokeWidth="0.7" opacity="0.55" />
      <path
        d="M24 31c6.2-1.8 11.6-1.8 17.5 0M21.5 36.5c8-2.2 14.8-2.2 22 0M26 42c5-1.3 9.4-1.3 14.2 0"
        stroke="#D4AF37"
        strokeWidth="1.7"
        strokeLinecap="round"
      />
      <path d="M44 45.5h9v4.2h-2.6V54h-3.8v-4.3H44z" fill="#D4AF37" />
    </svg>
  )
}
