import { Button } from '@/components/ui/button'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table'
import AppLayout from '@/layouts/app-layout'
import { Client, PaginatedData, type BreadcrumbItem } from '@/types'
import { Head, Link } from '@inertiajs/react'
import { Plus } from 'lucide-react'
import CreateDialog from './modals/create-dialog'

const breadcrumbs: BreadcrumbItem[] = [
  {
    title: 'Client Management',
    href: '/clients',
  },
]

export default function Index({ clients }: { clients: PaginatedData<Client> }) {
  const { data } = clients
  return (
    <AppLayout breadcrumbs={breadcrumbs}>
      <Head title='Index' />
      <div className='flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4'>
        <div className='mb-6 flex items-end justify-between'>
          <div className='max-w-2xl space-y-2'>
            <h1 className='text-3xl font-semibold'>Client Management</h1>
            <p className='text-neutral-600'>
              Manage all your clients from a single dashboard. View detailed information, update existing client records, add new clients quickly, and
              keep your client data organized and up to date.
            </p>
          </div>
          <CreateDialog>
            <Button className='font-medium'>
              <Plus className='h-4 w-4' />
              Create Client
            </Button>
          </CreateDialog>
        </div>
        <Table>
          <TableHeader>
            <TableRow>
              <TableHead>Name</TableHead>
              <TableHead>Phone</TableHead>
              <TableHead>Email</TableHead>
              <TableHead>Created</TableHead>
            </TableRow>
          </TableHeader>
          <TableBody>
            {data.map((client) => (
              <TableRow key={client.uuid}>
                <TableCell className='font-medium'>
                  <Link href={route('clients.show', client.uuid)} key={client.uuid} className='hover:text-blue-600'>
                    {client.name}
                  </Link>
                </TableCell>

                <TableCell>{client.phone}</TableCell>
                <TableCell>{client.email}</TableCell>
                <TableCell className='text-right'>{new Date(client.createdAt).toLocaleDateString()}</TableCell>
              </TableRow>
            ))}
          </TableBody>
        </Table>
      </div>
    </AppLayout>
  )
}
