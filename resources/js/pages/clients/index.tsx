import AppLayout from '@/layouts/app-layout'
import { Client, PaginatedData, type BreadcrumbItem } from '@/types'
import { Head } from '@inertiajs/react'

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Client Management',
    href: '/clients',
  },
]

export default function Index({ clients }: { clients: PaginatedData<Client> }) {
  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title='Index' />
      <div className='flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4'>
        {clients.data.map((item) => (
          <pre>{item.name}</pre>
        ))}
      </div>
    </AppLayout>
  )
}
