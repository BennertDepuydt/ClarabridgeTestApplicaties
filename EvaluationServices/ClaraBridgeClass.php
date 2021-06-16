<?php

class ClaraModel {
    private array $results;

    public function getJson(){
        $strJsonFileContents = file_get_contents('../TestApplicaties/clarabridge.json');
        return json_decode($strJsonFileContents, true);
    }

    public function addIntentClassifcation($query, $intents)
    {
        if(count($intents) === 0){
            if($query == ""){
                $this->results[] = array(
                    'query' => $query,
                    'intent' => "empty_string",
                    'score' => 0,
                );
            }
            else {
                $this->results[] = array(
                    'query' => $query,
                    'intent' => "not_found",
                    'score' => 0,
                );
            }
        }
        else {
            $this->results[] = array(
                'query' => $query,
                'intent' => $intents,
                'score' => 0,
            );
        }
    }

    public function getResults(){
        return $this->results;
    }
    public function getIndexResults($i){
        return $this->results[$i];
    }

    public function toJson(){
        $data = json_encode($this->results);
        $fp = fopen( 'results/clara.json', 'w');
        fwrite($fp, json_encode(json_decode($data), JSON_PRETTY_PRINT));
        fclose($fp);
    }


    function convertTagToIntent($intent)
    {
        $string = "";
        switch ($intent) {
            case "Transportation » Baggage » Retrieval":
            case "Transportation » Baggage » Lost-stolen":
                $string = "flight_baggage_lost";
                break;
            case "Airline Journey » Airport Experience » Check-in Experience » Bag Check":
            case "Transportation » Baggage » Handling":
            case "Transportation » Baggage":
                $string = "flight_baggage";
                break;
            case "Transportation » Ticketing-reservations » Changes":
                $string = "flight_ticket_booking_changes";
                break;
            case "Transportation » Ticketing-reservations » Online":
            case "Claralines - Custom Model \u00bb Digital Experience \u00bb Mobile Experience \u00bb Mobile Experience - Reservations":
            case "Transportation » Ticketing-reservations":
                $string = "flight_ticket_booking";
                break;
            case "Airline Journey » Onboard Product And Service":
            case "Airline Journey » Irrops Handling » Irrops - Communication":
            case "Customer Escalation » Customer Escalation » Cries For Help":
            case "Transportation » Special Needs":
            case "Claralines - Custom Model » IRROPS Handling » IRROPs - Quality of Rebooking » Rebooking- Staff Competence":
            case "Transportation » Facilities":
            case "Emotions (basic) » Confusion":
                $string = "flight_question";
                break;
            case "Transportation » Travel Experience":
            case "Airline Journey » Airport Experience":
            case "Transportation » Facilities » Cleanliness":
            case "Airline Journey » Irrops Handling » Irrops - Quality Of Rebooking » Rebooking- Staff Competence":
            case "Airline Journey » Aircraft Experience":
            case "Airline Journey » Aircraft Experience » Cabin Cleanliness":
            case "Customer Escalation » Operational Improvements » Unable To Find Information":
            case "Customer Escalation » Operational Improvements":
            case "Transportation » Staff » Attitude":
            case "Customer Escalation » Formal Channels » Formal Complaint":
            case "Basic Emotions » Happiness":
            case "Basic Emotions » Surprise":
            case "Emotions (basic) » Anger":
            case "Emotions (basic) » Happiness":
            case "Emotions (basic) » Love":
            case "Emotions (basic) » Anticipation":
            case "Emotions (basic) » Disgust":
            case "Emotions (basic) » Surprise":
            case "Airline Journey » Irrops Handling":
                $string = "flight_experience_review";
                break;
            case "Transportation » Special Needs » Pets":
                $string = "flight_pets";
                break;
            case "Transportation » Travel Experience » Cancellations":
                $string = "flight_canceled";
                break;
            case "Transportation » Travel Experience » Delays":
                $string = "flight_delays";
                break;
            case "Airline Journey » Digital Experience » Mobile Experience":
            case "Airline Journey » Digital Experience » Website Experience":
                $string = "flight_ticket_online_problem";
                break;

            case "Transportation » Travel Experience » Pricing-value":
            case "Transportation » Ticketing-reservations » Cost":
                $string = "flight_ticket_pricing";
                break;
            case "Transportation » Food":
            case "Airline Journey » Onboard Product And Service » Food And Beverage » Fandb - Beverages » Beverages - Alcoholic":
            case "Airline Journey » Onboard Product And Service » Food And Beverage":
                $string = "flight_food_information";
                break;
            case "Airline Journey » Call Center » Call Center - Wait Time":
            case "Airline Journey » Call Center":
                $string = "flight_service_call_center";
                break;
            case "Transportation » Ticketing-reservations » Refunds":
                $string = "flight_ticket_refunds";
                break;
            case "Transportation » Ticketing-reservations » Cancellation":
                $string = "flight_ticket_cancel";
                break;
            case "Airline Journey » Onboard Product And Service » Food And Beverage » Fandb - Food » Quality Of Food":
                $string = "flight_food_experience_review";
                break;
            case "Airline Journey » Promotions » Promotions - Discounts":
                $string = "flight_ticket_discount";
                break;
            case "Transportation » Check-in Experience":
            case "Transportation » Check-in Experience » Counters":
            case "Airline Journey » Digital Experience » Mobile Experience » Mobile Experience - Check In":
                $string = "flight_checkin";
                break;
            case "Airline Journey » Aircraft Experience » Cabin Condition » Condition - Seat Cushion":
            case "Airline Journey » Aircraft Experience » Cabin Cleanliness » Cleanliness - Seat Cushions":
                $string = "flight_seats";
                break;
            case "Airline Journey » Promotions":
                $string = "flight_reservation_upgrade";
                break;


        }
        return $string;

    }
}


