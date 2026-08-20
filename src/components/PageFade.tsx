import { useLocation } from 'react-router-dom'
import type { ReactNode } from 'react'

export function PageFade({ children }: { children: ReactNode }) {
  const location = useLocation()

  return (
    <div className="page-fade" key={location.pathname}>
      {children}
    </div>
  )
}
