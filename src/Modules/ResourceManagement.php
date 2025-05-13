<?php
class ResourceManagement
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  // Event Resource Management
  public function allocateEventResources($eventId, $resources)
  {
    $query = "INSERT INTO event_resources (event_id, resource_type, quantity, status) 
                 VALUES (?, ?, ?, 'allocated')";

    foreach ($resources as $resource) {
      $this->db->execute($query, [
        $eventId,
        $resource['type'],
        $resource['quantity']
      ]);
    }
  }

  public function checkResourceAvailability($resourceType, $date)
  {
    $query = "SELECT 
                    SUM(quantity) as allocated
                 FROM event_resources er
                 JOIN events e ON er.event_id = e.id
                 WHERE er.resource_type = ? 
                 AND e.event_date = ?
                 AND er.status = 'allocated'";

    return $this->db->fetchOne($query, [$resourceType, $date]);
  }

  // Campaign Resource Management
  public function allocateCampaignResources($campaignId, $resources)
  {
    $query = "INSERT INTO campaign_resources (campaign_id, resource_type, quantity, status) 
                 VALUES (?, ?, ?, 'allocated')";

    foreach ($resources as $resource) {
      $this->db->execute($query, [
        $campaignId,
        $resource['type'],
        $resource['quantity']
      ]);
    }
  }

  public function releaseResources($resourceId, $type)
  {
    $table = $type . '_resources';
    $query = "UPDATE $table SET status = 'released' WHERE id = ?";
    return $this->db->execute($query, [$resourceId]);
  }

  // Volunteer Resource Management
  public function assignVolunteers($eventId, $volunteers)
  {
    $query = "INSERT INTO volunteer_assignments (event_id, volunteer_id, status) 
                 VALUES (?, ?, 'assigned')";

    foreach ($volunteers as $volunteerId) {
      $this->db->execute($query, [$eventId, $volunteerId]);
    }
  }

  public function checkVolunteerAvailability($volunteerId, $date)
  {
    $query = "SELECT COUNT(*) as assignments
                 FROM volunteer_assignments va
                 JOIN events e ON va.event_id = e.id
                 WHERE va.volunteer_id = ?
                 AND e.event_date = ?
                 AND va.status = 'assigned'";

    return $this->db->fetchOne($query, [$volunteerId, $date]);
  }
}
