<?php

namespace App\Mail\Pedido;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ConfirmarPedido extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }
    public function confirmarpedido($nropedido)
    {
     dd($nropedido);
        // Luego, envía el correo electrónico usando la clase Mailable
        Mail::to('destinatario@example.com')->send(new ConfirmarPedido());
    
        return "Correo de confirmación enviado";
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return (new Envelope())
        ->from('titocarlos080@gmail.com', 'Tito Nombre')
        ->subject('Confirmar Pedido');
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
