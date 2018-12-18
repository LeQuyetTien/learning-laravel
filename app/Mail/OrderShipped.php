<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Product;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Product
     */
    public $product;
    protected $name;
    protected $email;
    protected $phone;
    protected $address;
    protected $note;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product, $name, $email, $phone, $address, $note)
    {
        $this->product = $product;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->note = $note;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = config('app.name').' - Đơn hàng '.$this->product->id.' đẵ được mua thành công!';
        return $this->from('ntusoftwareclub@gmail.com')
                    ->markdown('emails.orders.shipped')
                    ->subject($subject)
                    ->attach(storage_path('app/public/').$this->product->image)
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'phone' => $this->phone,
                        'address' => $this->address,
                        'note' => $this->note,
                    ]);
    }
}
