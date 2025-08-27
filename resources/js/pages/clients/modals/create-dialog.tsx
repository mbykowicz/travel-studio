import { Dialog, DialogContent, DialogDescription, DialogHeader, DialogTitle, DialogTrigger } from '@/components/ui/dialog'
import { useState } from 'react'

export default function CreateDialog({ children }: { children: React.ReactNode }) {
  const [isOpen, setIsOpen] = useState(false)
  return (
    <Dialog open={isOpen} onOpenChange={setIsOpen}>
      <DialogTrigger asChild>{children}</DialogTrigger>
      <DialogContent>
        <DialogHeader>
          <DialogTitle>Create New Client</DialogTitle>
          <DialogDescription>
            Fill out the form below to add a new client to your system. Provide the client’s name, phone number, and email address. Once submitted,
            the client will be added immediately and you can continue managing your clients.
          </DialogDescription>
        </DialogHeader>
      </DialogContent>
    </Dialog>
  )
}
