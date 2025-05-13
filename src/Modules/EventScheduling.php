<?php
class EventScheduling {
    private $db;
    private $resourceManager;

    public function __construct($db) {
        $this->db = $db;
        $this->resourceManager = new ResourceManagement($db);
    }

    public function scheduleEvent($eventData) {
        // Begin transaction
        $this->db->beginTransaction();

        try {
            // Create event
            $query = "INSERT INTO events (
                title, description, event_date, start_time, end_time, 
                location, max_participants, status, created_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, 'scheduled', NOW())";

            $eventId = $this->db->execute($query, [
                $eventData['title'],
                $eventData['description'],
                $eventData['event_date'],
                $eventData['start_time'],
                $eventData['end_time'],
                $eventData['location'],
                $eventData['max_participants']
            ]);

            // Allocate resources if specified
            if (isset($eventData['resources'])) {
                $this->resourceManager->allocateEventResources($eventId, $eventData['resources']);
            }

            // Assign volunteers if specified
            if (isset($eventData['volunteers'])) {
                $this->resourceManager->assignVolunteers($eventId, $eventData['volunteers']);
            }

            $this->db->commit();
            return $eventId;

        } catch (Exception $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    public function rescheduleEvent($eventId, $newData) {
        // Validate new schedule
        if (!$this->isTimeSlotAvailable($newData['event_date'], $newData['start_time'], $newData['end_time'], $eventId)) {
            throw new Exception("Time slot is not available");
        }

        $query = "UPDATE events SET 
                    event_date = ?, 
                    start_time = ?, 
                    end_time = ?,
                    updated_at = NOW()
                 WHERE id = ?";

        return $this->db->execute($query, [
            $newData['event_date'],
            $newData['start_time'],
            $newData['end_time'],
            $eventId
        ]);
    }

    public function cancelEvent($eventId, $reason) {
        // Begin transaction
        $this->db->beginTransaction();

        try {
            // Update event status
            $query = "UPDATE events SET 
                        status = 'cancelled',
                        cancellation_reason = ?,
                        updated_at = NOW()
                     WHERE id = ?";
            
            $this->db->execute($query, [$reason, $eventId]);

            // Release allocated resources
            $this->releaseEventResources($eventId);

            // Notify participants
            $this->notifyParticipants($eventId, 'event_cancelled', [
                'reason' => $reason
            ]);

            $this->db->commit();
            return true;

        } catch (Exception $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    private function isTimeSlotAvailable($date, $startTime, $endTime, $excludeEventId = null) {
        $query = "SELECT COUNT(*) as conflicts
                 FROM events 
                 WHERE event_date = ?
                 AND ((start_time BETWEEN ? AND ?) 
                      OR (end_time BETWEEN ? AND ?))
                 AND status = 'scheduled'";
        
        $params = [$date, $startTime, $endTime, $startTime, $endTime];

        if ($excludeEventId) {
            $query .= " AND id != ?";
            $params[] = $excludeEventId;
        }

        $result = $this->db->fetchOne($query, $params);
        return $result['conflicts'] == 0;
    }

    private function releaseEventResources($eventId) {
        $query = "UPDATE event_resources SET status = 'released' WHERE event_id = ?";
        return $this->db->execute($query, [$eventId]);
    }

    private function notifyParticipants($eventId, $type, $data) {
        // Implementation for notification system
        // This could be integrated with your existing Notification class
    }
}
?>
