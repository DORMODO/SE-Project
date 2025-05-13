<?php

include __DIR__ . '/../Controllers/DBController.php';
include __DIR__ . '/Notification.php';
class Donor extends User
{
    public $db;
    public $notification = new Notification();

    private CampaignFilterService $filterService;

    // public function __construct(string $userId, string $name, string $email, string $password, CampaignFilterService $filterService)
    // {
    //     parent::__construct($userId, $name, $email, $password);
    //     $this->filterService = $filterService;
    //     $this->notification = new Notification();
    // }

    public function viewCampaigns(): array
    {
        // TODO
        return [];
    }

    public function viewCampaignDetails(string $campaignId): ?Campaign
    {
        // TODO
        return null;
    }

    public function filterCampaigns(): void
    {
        // delegated to service
    }

    public function viewDonationHistory(): array
    {
        // TODO
        return [];
    }

    public function resetCampaignFilters(): void
    {
        // TODO
    }

    public function makeOneTimeDonation($donor_name, $email, $phone_number, $amount, $donation_type, $payment_method, $message, $donation_date, $donor_id, $guest_id, $campaign_id): bool
    {
        if ($this->db->openConnection()) {
            $query = "INSERT INTO donations (donor_name	,email,	phone_number,	amount	,donation_type,	payment_method,	message	,donation_date	,donor_id	,guest_id,	campaign_id	) 
                      VALUES ( '$donor_name','$email','$phone_number','$amount','$donation_type','$payment_method','$message', '$donation_date', '$donor_id','$guest_id','$campaign_id'";

            if ($this->db->connection->query($query) === TRUE) {
                $message = "Thank you for your donation of $$amount!";
                $this->notification->createNotification($donor_id, $donation_date, $message);

                echo '<script>alert("Donation successful!");</script>';
                return true;
            } else {
                echo '<script>alert("Error: ' . $this->db->connection->error . '");</script>';
                return false;
            }
        }
        return false;
    }

    public function makeRecurringDonation(array $donationData): Donation
    {
        // TODO
        return new Donation('', 0.0, new \DateTime(), '');
    }

    public function setDonationSchedule(string $donationId, string $frequency): bool
    {
        // TODO
        return false;
    }

    public function cancelRecurringDonation(): bool
    {
        // TODO
        return false;
    }

    public function selectDonationType(string $type): void
    {
        // TODO
    }

    public function trackDonation(string $donationId): ?Donation
    {
        // TODO
        return null;
    }

    public function donateToCampaign(array $donationData, string $campaignId): Donation
    {
        // TODO
        return new Donation('', 0.0, new \DateTime(), '');
    }

    public function recoverPassword(string $email): bool
    { /* TODO */
        return false;
    }
}
