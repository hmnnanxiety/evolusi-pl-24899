import { describe, expect, it } from 'vitest'
import { formatTaskStatus } from '../taskStatus'

describe('formatTaskStatus', () => {
  it('menampilkan status selesai', () => {
    expect(formatTaskStatus(true)).toBe('Selesai')
  })

  it('menampilkan status belum selesai', () => {
    expect(formatTaskStatus(true)).toBe('Sengaja Gagal')
  })
})