import { Button } from '@/components/ui/button'
import AppLayout from '@/layouts/app-layout'
import { Client, type BreadcrumbItem } from '@/types'
import { Head } from '@inertiajs/react'
import { Edit2 } from 'lucide-react'
import EditDialog from './modals/edit-dialog'

export default function Show({ client }: { client: { data: Client } }) {
  const breadcrumbs: BreadcrumbItem[] = [
    {
      title: 'Client Management',
      href: '/clients',
    },
    {
      title: 'Client Overview',
      href: `/clients/${client.data.uuid}`,
    },
  ]

  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title='Index' />
      <div className='flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4'>
        <div className='mb-6 flex items-end justify-between'>
          <div className='max-w-2xl space-y-2'>
            <h1 className='text-3xl font-semibold'>Overview</h1>
            <p className='text-neutral-600'>
              Get a complete view of your client’s details, including contact information, recent activity, and related records. Quickly access
              everything you need to manage and support this client effectively.
            </p>
          </div>
          <EditDialog>
            <Button className='font-medium'>
              <Edit2 className='h-4 w-4' />
              Edit
            </Button>
          </EditDialog>
        </div>
        <div></div>
      </div>
    </AppLayout>
  )
}
