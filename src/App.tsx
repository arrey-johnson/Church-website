import { Navigate, Route, Routes } from 'react-router-dom'
import { defaultLang } from './i18n'
import { Layout } from './components/Layout'
import { HomePage } from './pages/HomePage'
import { MinistriesPage } from './pages/MinistriesPage'
import { NewHerePage } from './pages/NewHerePage'
import { NotFoundPage } from './pages/NotFoundPage'
import { PrayerPage } from './pages/PrayerPage'
import { PrivacyPage } from './pages/PrivacyPage'
import { SupportPage } from './pages/SupportPage'
import { TeachingsPage } from './pages/TeachingsPage'
import { TestimoniesPage } from './pages/TestimoniesPage'
import { VisionPage } from './pages/VisionPage'

export default function App() {
  return (
    <Routes>
      <Route path="/" element={<Navigate to={`/${defaultLang}`} replace />} />
      <Route path="/:lang" element={<Layout />}>
        <Route index element={<HomePage />} />
        <Route path="new-here" element={<NewHerePage />} />
        <Route path="vision" element={<VisionPage />} />
        <Route path="ministries" element={<MinistriesPage />} />
        <Route path="teachings" element={<TeachingsPage />} />
        <Route path="testimonies" element={<TestimoniesPage />} />
        <Route path="prayer" element={<PrayerPage />} />
        <Route path="support" element={<SupportPage />} />
        <Route path="privacy" element={<PrivacyPage />} />
        <Route path="*" element={<NotFoundPage />} />
      </Route>
      <Route path="*" element={<NotFoundPage />} />
    </Routes>
  )
}
