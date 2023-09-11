<?php

namespace App\Notifications;

use App\Models\Complaint;
use DateTimeImmutable;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\WhatsApp\Component;
use NotificationChannels\WhatsApp\WhatsAppChannel;
use NotificationChannels\WhatsApp\WhatsAppTemplate;

class WhatsAppNotices extends Notification implements ShouldQueue
{
    use Queueable;

	public Complaint $complaint;

    /**
     * Create a new notification instance.
     */
    public function __construct(Complaint $complaint)
	{
		$this->complaint = $complaint;
	}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
	public function via(object $notifiable): array
	{
		return [WhatsAppChannel::class];
	}

	/**
	 * Get the whatsapp representation of the notification.
	 *
	 * @param object $notifiable
	 * @return WhatsAppTemplate
	 * @throws Exception
	 */
	public function toWhatsApp(object $notifiable): WhatsAppTemplate
	{
		if ($this->complaint->response === null) {
			return WhatsAppTemplate::create()
				->name('complaint') // Name of your configured template
				->header(Component::text($this->complaint->concern))
				->body(Component::text($this->complaint->full_name))
				->body(Component::text($this->complaint->first_name))
				->body(Component::text($this->complaint->last_name))
				->body(Component::text($this->complaint->sex))
				->body(Component::text($this->complaint->stakeholder_type))
				->body(Component::text($this->complaint->age_range))
				->body(Component::text($this->complaint->telephone))
				->body(Component::text($this->complaint->email_address))
				->body(Component::text($this->complaint->region->name))
				->body(Component::text($this->complaint->district->name))
				->body(Component::text($this->complaint->concern))
				->body(Component::text($this->complaint->response_channel))
				->body(Component::text($this->complaint->details))
				->body(Component::text($this->complaint->is_anonymous ? 'Yes' : 'No'))
	//			->body(Component::dateTime(new \DateTimeImmutable))
	//			->to('233541240558'); // Sir John number
				->to($this->complaint->telephone);
		}

		return WhatsAppTemplate::create()
			->name('complaint_reply') // Name of your configured template
			->header(Component::text($this->complaint->concern))
			->body(Component::text($this->complaint->full_name))
			->body(Component::text($this->complaint->first_name))
			->body(Component::text($this->complaint->last_name))
			->body(Component::text($this->complaint->sex))
			->body(Component::text($this->complaint->stakeholder_type))
			->body(Component::text($this->complaint->age_range))
			->body(Component::text($this->complaint->telephone))
			->body(Component::text($this->complaint->email_address))
			->body(Component::text($this->complaint->region->name))
			->body(Component::text($this->complaint->district->name))
			->body(Component::text($this->complaint->concern))
			->body(Component::text($this->complaint->response_channel))
			->body(Component::text($this->complaint->details))
			->body(Component::text($this->complaint->is_anonymous ? 'Yes' : 'No'))
			->body(Component::text($this->complaint->response))
			->body(Component::dateTime(new DateTimeImmutable($this->complaint->created_at), 'l, dS M, Y @H:i A'))
			->to($this->complaint->telephone);
	}

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
//		dd($notifiable);
        return [
            //
        ];
    }
}
