<?php 
	class ResOfficerReservationDetail {
		private $db;

		public function __construct() {
			$this->db = new Database;
		}

	public function getStations()
    {
        $this->db->query('SELECT * FROM station');
        $result=$this->db->resultSet();
        return $result;
    }

    public function checkStation($station){
        $this->db->query('SELECT COUNT(*) AS count FROM station WHERE stationID=:station');
        $this->db->bind(':station', $station);
        $row=$this->db->single();
        if ($row->count>0){
            return true;
        }else{
            return false;
        }
    }

    public function searchSrcOnly($data)
    {
        $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
        INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
        INNER JOIN station s1 ON t.src_station=s1.stationID
        INNER JOIN station s2 ON t.dest_station=s2.stationID
        WHERE t.dest_station <> :srcStation
      	');
        $this->db->bind(':time', $data['time']);
        $this->db->bind(':srcStation', $data['srcStation']);

        $trains=$this->db->resultSet();
        return $trains;
    }

    public function searchSrcDate($data)
    {
        switch ($data['date']) {
            case 'Monday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.monday="Yes" AND t.dest_station <> :srcStation
                ');
                break;
            case 'Tuesday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.tuesday="Yes" AND t.dest_station <> :srcStation
                ');
                break;
            case 'Wednesday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.wednesday="Yes" AND t.dest_station <> :srcStation
                ');
                break;
            case 'Thursday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.thursday="Yes" AND t.dest_station <> :srcStation
                ');
                break;
            case 'Friday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.friday="Yes" AND t.dest_station <> :srcStation
                ');
                break;
            case 'Saturday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.saturday="Yes" AND t.dest_station <> :srcStation
                ');
                break;
            case 'Sunday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.sunday="Yes" AND t.dest_station <> :srcStation
                ');
        }

        $this->db->bind(':srcStation', $data['srcStation']);
        $this->db->bind(':time', $data['time']);
        $trains=$this->db->resultSet();
        return $trains;
    }


    public function searchDestOnly($data)
    {
        $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
        INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
        INNER JOIN station s1 ON t.src_station=s1.stationID
        INNER JOIN station s2 ON t.dest_station=s2.stationID
        WHERE t.src_station <> :destStation
      	');
        $this->db->bind(':destStation', $data['destStation']);
        $this->db->bind(':time', $data['time']);
        $trains = $this->db->resultSet();
        return $trains;
    }

    public function searchDestDate($data)
    {
        switch ($data['date']) {
            case 'Monday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.monday="Yes" AND t.src_station <> :destStation
                ');
                break;
            case 'Tuesday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.tuesday="Yes" AND t.src_station <> :destStation
                ');
            case 'Wednesday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.wednesday="Yes" AND t.src_station <> :destStation
                ');
                break;
            case 'Thursday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.thursday="Yes" AND t.src_station <> :destStation
                ');
                break;
            case 'Friday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.friday="Yes" AND t.src_station <> :destStation
                ');
                break;
            case 'Saturday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.saturday="Yes" AND t.src_station <> :destStation
                ');
                break;
            case 'Sunday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name FROM train t
                INNER JOIN (SELECT r.trainId FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation AND rs.departuretime>=cast(:time AS time)) t1 ON t.trainId=t1.trainId
                INNER JOIN station s1 ON t.src_station=s1.stationID
                INNER JOIN station s2 ON t.dest_station=s2.stationID
                INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.sunday="Yes" AND t.src_station <> :destStation
                ');
                break;
        }

        $this->db->bind(':destStation', $data['destStation']);
        $this->db->bind(':time', $data['time']);
        $trains=$this->db->resultSet();
        return $trains;
    }


    public function searchSrcDestOnly($data){
        $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name  FROM train t
            INNER JOIN (SELECT t1.trainId FROM
                                (SELECT r.trainId, rs.stopNo, rs.departuretime FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation)
                                 t1 INNER JOIN (SELECT r.trainId, rs.stopNo FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation)
                                 t2 ON t1.trainId=t2.trainId WHERE t1.stopNo<t2.stopNo and t1.departuretime>=cast(:time AS time)) 
            t3 ON t.trainId=t3.trainId
            INNER JOIN station s1 ON s1.stationID=t.src_station
            INNER JOIN station s2 ON s2.stationID=t.dest_station
            ');

        $this->db->bind(':srcStation', $data['srcStation']);
        $this->db->bind(':destStation', $data['destStation']);
        $this->db->bind(':time', $data['time']);

        $trains=$this->db->resultSet();
        return $trains;

    }

    public function searchSrcDestDate($data){
        switch ($data['date']){
            case 'Monday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name  FROM train t
                    INNER JOIN (SELECT t1.trainId FROM
                                        (SELECT r.trainId, rs.stopNo, rs.departuretime FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation)
                                         t1 INNER JOIN (SELECT r.trainId, rs.stopNo FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation)
                                         t2 ON t1.trainId=t2.trainId WHERE t1.stopNo<t2.stopNo and t1.departuretime>=cast(:time AS time)) 
                    t3 ON t.trainId=t3.trainId
                    INNER JOIN station s1 ON s1.stationID=t.src_station
                    INNER JOIN station s2 ON s2.stationID=t.dest_station
                    INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.monday="Yes"
                ');
                break;
            case 'Tuesday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name  FROM train t
                    INNER JOIN (SELECT t1.trainId FROM
                                        (SELECT r.trainId, rs.stopNo, rs.departuretime FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation)
                                         t1 INNER JOIN (SELECT r.trainId, rs.stopNo FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation)
                                         t2 ON t1.trainId=t2.trainId WHERE t1.stopNo<t2.stopNo and t1.departuretime>=cast(:time AS time)) 
                    t3 ON t.trainId=t3.trainId
                    INNER JOIN station s1 ON s1.stationID=t.src_station
                    INNER JOIN station s2 ON s2.stationID=t.dest_station
                    INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.tuesday="Yes"
                ');
                break;
            case 'Wednesday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name  FROM train t
                    INNER JOIN (SELECT t1.trainId FROM
                                        (SELECT r.trainId, rs.stopNo, rs.departuretime FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation)
                                         t1 INNER JOIN (SELECT r.trainId, rs.stopNo FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation)
                                         t2 ON t1.trainId=t2.trainId WHERE t1.stopNo<t2.stopNo and t1.departuretime>=cast(:time AS time)) 
                    t3 ON t.trainId=t3.trainId
                    INNER JOIN station s1 ON s1.stationID=t.src_station
                    INNER JOIN station s2 ON s2.stationID=t.dest_station
                    INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.wednesday="Yes"
                ');
                break;
            case 'Thursday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name  FROM train t
                    INNER JOIN (SELECT t1.trainId FROM
                                        (SELECT r.trainId, rs.stopNo, rs.departuretime FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation)
                                         t1 INNER JOIN (SELECT r.trainId, rs.stopNo FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation)
                                         t2 ON t1.trainId=t2.trainId WHERE t1.stopNo<t2.stopNo and t1.departuretime>=cast(:time AS time)) 
                    t3 ON t.trainId=t3.trainId
                    INNER JOIN station s1 ON s1.stationID=t.src_station
                    INNER JOIN station s2 ON s2.stationID=t.dest_station
                    INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.thursday="Yes"
                ');
                break;
            case 'Friday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name  FROM train t
                    INNER JOIN (SELECT t1.trainId FROM
                                        (SELECT r.trainId, rs.stopNo, rs.departuretime FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation)
                                         t1 INNER JOIN (SELECT r.trainId, rs.stopNo FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation)
                                         t2 ON t1.trainId=t2.trainId WHERE t1.stopNo<t2.stopNo and t1.departuretime>=cast(:time AS time)) 
                    t3 ON t.trainId=t3.trainId
                    INNER JOIN station s1 ON s1.stationID=t.src_station
                    INNER JOIN station s2 ON s2.stationID=t.dest_station
                    INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.friday="Yes"
                ');
                break;
            case 'Saturday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name  FROM train t
                    INNER JOIN (SELECT t1.trainId FROM
                                        (SELECT r.trainId, rs.stopNo, rs.departuretime FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation)
                                         t1 INNER JOIN (SELECT r.trainId, rs.stopNo FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation)
                                         t2 ON t1.trainId=t2.trainId WHERE t1.stopNo<t2.stopNo and t1.departuretime>=cast(:time AS time)) 
                    t3 ON t.trainId=t3.trainId
                    INNER JOIN station s1 ON s1.stationID=t.src_station
                    INNER JOIN station s2 ON s2.stationID=t.dest_station
                    INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.saturday="Yes"
                ');
                break;
            case 'Sunday':
                $this->db->query('SELECT t.*, s1.name AS src_name, s2.name AS dest_name  FROM train t
                    INNER JOIN (SELECT t1.trainId FROM
                                        (SELECT r.trainId, rs.stopNo, rs.departuretime FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:srcStation)
                                         t1 INNER JOIN (SELECT r.trainId, rs.stopNo FROM route r INNER JOIN route_station rs ON r.routeId=rs.routeId WHERE rs.stationID=:destStation)
                                         t2 ON t1.trainId=t2.trainId WHERE t1.stopNo<t2.stopNo and t1.departuretime>=cast(:time AS time)) 
                    t3 ON t.trainId=t3.trainId
                    INNER JOIN station s1 ON s1.stationID=t.src_station
                    INNER JOIN station s2 ON s2.stationID=t.dest_station
                    INNER JOIN availabledays a ON a.trainId=t.trainId WHERE a.sunday="Yes"
                ');
                break;

        }
        $this->db->bind(':srcStation', $data['srcStation']);
        $this->db->bind(':destStation', $data['destStation']);
        $this->db->bind(':time', $data['time']);

        $trains=$this->db->resultSet();
        return $trains;

    }

    public function getTrain($trainId){
        $this->db->query('
    SELECT t1.*, ss.name AS src_name FROM
    (SELECT t.*, sd.name AS dest_name FROM train t INNER JOIN station sd ON t.dest_station=sd.stationID WHERE t.trainId=:trainId)
    t1 INNER JOIN station ss ON t1.src_station=ss.stationID');
        $this->db->bind(':trainId', $trainId);
        $row=$this->db->single();
        return $row;
    }

    public function getSchedule($trainId){
        $this->db->query('SELECT t1.*,s.name FROM (SELECT rs.* FROM (SELECT * FROM route WHERE trainId=:trainId) rt INNER JOIN route_station rs ON rs.routeId=rt.routeId) t1 INNER JOIN station s on s.stationId=t1.stationId');
        $this->db->bind(':trainId', $trainId);
        $results=$this->db->resultSet();
        return $results;
    }

    public function getDays($trainId){
        $this->db->query('SELECT * FROM availabledays WHERE trainId=:trainId');
        $this->db->bind(':trainId', $trainId);
        $row=$this->db->single();
        return $row;
    }

    public function getRate ($trainId)
    {
        $this->db->query('SELECT f.* FROM fare f INNER JOIN train t ON f.rateID=f.rateID WHERE t.trainId=:trainId');
        $this->db->bind(":trainId", $trainId);
        $row=$this->db->single();
        return $row;
    }

    public function findTrain($trainId, $nic){
        $this->db->query('SELECT * FROM ticket WHERE trainId=:trainId AND nic=:nic');

        $this->db->bind(':trainId', $trainId);
        $this->db->bind(':nic', $nic);

        $row = $this->db->single();
        return $row;
    }

    public function findTrainName($trainId){
        $this->db->query('SELECT name FROM train WHERE trainId=:trainId');

        $this->db->bind(':trainId', $trainId);

        $row = $this->db->single();
        return $row;
    }

    public function findPassengerDetails($nic){
        $this->db->query('SELECT * FROM passenger WHERE nic=:nic');

        $this->db->bind(':nic', $nic);

        $row = $this->db->single();
        return $row;
    }

    public function findSeatDetails($nic){
        $this->db->query('SELECT * FROM seat WHERE nic=:nic');

        $this->db->bind(':nic', $nic);

        $row = $this->db->single();
        return $row;
    }

    public function getReservationDetails($trainId, $searchDate){
        $this->db->query('SELECT t.trainId, t.name, ti.ticketId, ti.price, ti.reservationType, ti.compartmentNo, ti.seatNo, ti.nic, s.classType, s.status, r.JourneyDate, r.start_station, r.dest_station
        FROM train t 
        INNER JOIN ticket ti 
        ON t.trainId=ti.trainId
        INNER JOIN  seat s 
        ON t.trainId=s.trainId 
        INNER JOIN reservation r
        ON r.reservationNo=s.reservationNo
        WHERE t.trainId=:trainId AND r.JourneyDate=:searchDate');

        $this->db->bind(":trainId",$trainId);
        $this->db->bind(":searchDate", $searchDate);
        $results=$this->db->resultSet();
        return $results;

    }

    public function getPassengerDetails($trainId, $ticketId, $nic){
        $this->db->query('SELECT t.trainId, t.name, ti.ticketId, ti.price, ti.reservationType, ti.compartmentNo, ti.seatNo, ti.nic, s.classtype, s.status, r.JourneyDate, r.start_station, r.dest_station, p.firstname, p.lastname, p.mobileno
        FROM train t 
        INNER JOIN ticket ti 
        ON t.trainId=ti.trainId
        INNER JOIN  seat s 
        ON t.trainId=s.trainId 
        INNER JOIN passenger p
        ON p.nic=ti.nic
        INNER JOIN reservation r
        ON r.reservationNo=s.reservationNo
        WHERE t.trainId=:trainId AND ti.ticketId=:ticketId AND ti.nic=:nic');

        $this->db->bind(":trainId",$trainId);
        $this->db->bind(':ticketId', $ticketId);
        $this->db->bind(':nic', $nic);

        $row = $this->db->single();
        return $row;
    }

	}
