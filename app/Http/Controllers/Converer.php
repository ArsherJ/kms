<?php

function calculateWeightForAgeStatus($ageInMonths, $sex, $weight)
{
    $result = "Unknown";
    $statusClass = "";

    $setWeightForAgeStatus = function ($severelyUnderweightLimit, $underweightLimit, $normalLimit) use (&$result, &$statusClass, $weight)
    {
        if ($weight <= $severelyUnderweightLimit) { $result = "Severely Underweight"; $statusClass = "bg-danger"; }
        elseif ($weight >= $underweightLimit && $weight <= $normalLimit) { $result = "Underweight"; $statusClass = "bg-warning"; }
        elseif ($weight > $normalLimit) { $result = "Normal"; $statusClass = "bg-success"; }
    };

    switch ($ageInMonths)
    {
        case 0:
            if ($sex === "Male") { setWeightForAgeStatus(2.1, 2.2, 4.4); }
            elseif ($sex === "Female") { setWeightForAgeStatus(2.0, 2.1, 4.2); }
            break;
        case 1:
            if ($sex === "Male") { setWeightForAgeStatus(2.9, 3.0, 5.8); }
            elseif ($sex === "Female") { setWeightForAgeStatus(2.7, 2.8, 5.5); }
            break;
        case 2:
            if ($sex === "Male") { setWeightForAgeStatus(3.8, 3.9, 7.1); }
            elseif ($sex === "Female") { setWeightForAgeStatus(3.4, 3.5, 6.6); }
            break;
        case 3:
            if ($sex === "Male") { setWeightForAgeStatus(4.4, 4.5, 8.0); }
            elseif ($sex === "Female") { setWeightForAgeStatus(4.0, 4.1, 7.5); }
            break;
        case 4:
            if ($sex === "Male") { setWeightForAgeStatus(4.9, 5.0, 8.7); }
            elseif ($sex === "Female") { setWeightForAgeStatus(4.4, 4.5, 8.2); }
            break;
        case 5:
            if ($sex === "Male") { setWeightForAgeStatus(5.3, 5.4, 9.3); }
            elseif ($sex === "Female") { setWeightForAgeStatus(4.8, 4.9, 8.8); }
            break;
        case 6:
            if ($sex === "Male") { setWeightForAgeStatus(5.7, 5.8, 9.8); }
            elseif ($sex === "Female") { setWeightForAgeStatus(5.1, 5.2, 9.3); }
            break;
        case 7:
            if ($sex === "Male") { setWeightForAgeStatus(5.9, 6.0, 10.3); }
            elseif ($sex === "Female") { setWeightForAgeStatus(5.3, 5.4, 9.8); }
            break;
        case 8:
            if ($sex === "Male") { setWeightForAgeStatus(6.2, 6.3, 10.7); }
            elseif ($sex === "Female") { setWeightForAgeStatus(5.6, 5.7, 10.2); }
            break;
        case 9:
            if ($sex === "Male") { setWeightForAgeStatus(6.4, 6.5, 11.0); }
            elseif ($sex === "Female") { setWeightForAgeStatus(5.8, 5.9, 10.5); }
            break;
        case 10:
            if ($sex === "Male") { setWeightForAgeStatus(6.6, 6.7, 11.4); }
            elseif ($sex === "Female") { setWeightForAgeStatus(5.9, 6.0, 10.9); }
            break;
        case 11:
            if ($sex === "Male") { setWeightForAgeStatus(6.8, 6.9, 11.7); }
            elseif ($sex === "Female") { setWeightForAgeStatus(6.1, 6.2, 11.2); }
            break;
        case 12:
            if ($sex === "Male") { setWeightForAgeStatus(6.9, 7.0, 12.0); }
            elseif ($sex === "Female") { setWeightForAgeStatus(6.3, 6.4, 11.5); }
            break;
        case 13:
            if ($sex === "Male") { setWeightForAgeStatus(7.1, 7.2, 12.3); }
            elseif ($sex === "Female") { setWeightForAgeStatus(6.4, 6.5, 11.8); }
            break;
        case 14:
            if ($sex === "Male") { setWeightForAgeStatus(7.2, 7.3, 12.6); }
            elseif ($sex === "Female") { setWeightForAgeStatus(6.6, 6.7, 12.1); }
            break;
        case 15:
            if ($sex === "Male") { setWeightForAgeStatus(7.4, 7.5, 12.8); }
            elseif ($sex === "Female") { setWeightForAgeStatus(6.7, 6.8, 12.4); }
            break;
        case 16:
            if ($sex === "Male") { setWeightForAgeStatus(7.5, 7.6, 13.1); }
            elseif ($sex === "Female") { setWeightForAgeStatus(6.9, 7.0, 12.6); }
            break;
        case 17:
            if ($sex === "Male") { setWeightForAgeStatus(7.7, 7.8, 13.4); }
            elseif ($sex === "Female") { setWeightForAgeStatus(6.9, 7.0, 12.9); }
            break;
        case 18:
            if ($sex === "Male") { setWeightForAgeStatus(7.8, 7.9, 13.7); }
            elseif ($sex === "Female") { setWeightForAgeStatus(7.2, 7.3, 13.2); }
            break;
        case 19:
            if ($sex === "Male") { setWeightForAgeStatus(8.0, 8.1, 13.9); }
            elseif ($sex === "Female") { setWeightForAgeStatus(7.3, 7.4, 13.5); }
            break;
        case 20:
            if ($sex === "Male") { setWeightForAgeStatus(8.1, 8.2, 14.2); }
            elseif ($sex === "Female") { setWeightForAgeStatus(7.5, 6.4, 13.7); }
            break;
        case 21:
            if ($sex === "Male") { setWeightForAgeStatus(8.2, 8.3, 14.5); }
            elseif ($sex === "Female") { setWeightForAgeStatus(7.6, 7.7, 14.0); }
            break;
        case 22:
            if ($sex === "Male") { setWeightForAgeStatus(8.4, 8.5, 14.7); }
            elseif ($sex === "Female") { setWeightForAgeStatus(7.8, 7.9, 14.3); }
            break;
        case 23:
            if ($sex === "Male") { setWeightForAgeStatus(8.5, 8.6, 15.0); }
            elseif ($sex === "Female") { setWeightForAgeStatus(7.9, 8.0, 14.6); }
            break;
        case 24:
            if ($sex === "Male") { setWeightForAgeStatus(8.6, 8.7, 15.3); }
            elseif ($sex === "Female") { setWeightForAgeStatus(8.1, 8.2, 14.8); }
            break;
        case 25:
            if ($sex === "Male") { setWeightForAgeStatus(8.8, 8.9, 15.5); }
            elseif ($sex === "Female") { setWeightForAgeStatus(8.2, 8.3, 15.1); }
            break;
        case 26:
            if ($sex === "Male") { setWeightForAgeStatus(8.9, 9.0, 15.8); }
            elseif ($sex === "Female") { setWeightForAgeStatus(8.4, 8.5, 15.4); }
            break;
        case 27:
            if ($sex === "Male") { setWeightForAgeStatus(9.0, 9.1, 16.1); }
            elseif ($sex === "Female") { setWeightForAgeStatus(8.5, 8.6, 15.7); }
            break;
        case 28:
            if ($sex === "Male") { setWeightForAgeStatus(9.1, 9.2, 16.3); }
            elseif ($sex === "Female") { setWeightForAgeStatus(8.6, 8.7, 16.0); }
            break;
        case 29:
            if ($sex === "Male") { setWeightForAgeStatus(9.2, 9.3, 16.6); }
            elseif ($sex === "Female") { setWeightForAgeStatus(8.8, 8.9, 16.2); }
            break;
        case 30:
            if ($sex === "Male") { setWeightForAgeStatus(9.4, 9.5, 16.9); }
            elseif ($sex === "Female") { setWeightForAgeStatus(8.9, 9.0, 16.5); }
            break;
        case 31:
            if ($sex === "Male") { setWeightForAgeStatus(9.5, 9.6, 17.1); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.0, 9.1, 16.8); }
            break;
        case 32:
            if ($sex === "Male") { setWeightForAgeStatus(9.6, 9.7, 17.4); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.1, 9.2, 17.1); }
            break;
        case 33:
            if ($sex === "Male") { setWeightForAgeStatus(9.7, 9.8, 17.6); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.3, 9.4, 17.3); }
            break;
        case 34:
            if ($sex === "Male") { setWeightForAgeStatus(9.8, 9.9, 17.8); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.4, 9.5, 17.6); }
            break;
        case 35:
            if ($sex === "Male") { setWeightForAgeStatus(9.9, 10.0, 18.1); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.5, 9.6, 17.9); }
            break;
        case 36:
            if ($sex === "Male") { setWeightForAgeStatus(10.0, 10.1, 18.3); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.6, 9.7, 18.1); }
            break;
        case 37:
            if ($sex === "Male") { setWeightForAgeStatus(10.1, 10.2, 18.6); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.7, 9.8, 18.4); }
            break;
        case 38:
            if ($sex === "Male") { setWeightForAgeStatus(10.2, 10.3, 18.8); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.8, 9.9, 18.7); }
            break;
        case 39:
            if ($sex === "Male") { setWeightForAgeStatus(10.3, 10.4, 19.0); }
            elseif ($sex === "Female") { setWeightForAgeStatus(9.9, 10.0, 19.0); }
            break;
        case 40:
            if ($sex === "Male") { setWeightForAgeStatus(10.4, 10.5, 19.3); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.1, 10.2, 19.2); }
            break;
        case 41:
            if ($sex === "Male") { setWeightForAgeStatus(10.5, 10.6, 19.5); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.2, 10.3, 19.5); }
            break;
        case 42:
            if ($sex === "Male") { setWeightForAgeStatus(10.6, 10.7, 19.7); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.3, 10.4, 19.8); }
            break;
        case 43:
            if ($sex === "Male") { setWeightForAgeStatus(10.7, 10.8, 20.0); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.4, 10.5, 20.1); }
            break;
        case 44:
            if ($sex === "Male") { setWeightForAgeStatus(10.8, 10.9, 20.2); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.5, 10.6, 20.4); }
            break;
        case 45:
            if ($sex === "Male") { setWeightForAgeStatus(10.9, 11.0, 20.5); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.6, 10.7, 20.7); }
            break;
        case 46:
            if ($sex === "Male") { setWeightForAgeStatus(11.0, 11.1, 20.7); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.7, 10.8, 20.9); }
            break;
        case 47:
            if ($sex === "Male") { setWeightForAgeStatus(11.1, 11.2, 20.9); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.8, 10.9, 21.2); }
            break;
        case 48:
            if ($sex === "Male") { setWeightForAgeStatus(11.2, 11.3, 21.2); }
            elseif ($sex === "Female") { setWeightForAgeStatus(10.9, 11.0, 21.5); }
            break;
        case 49:
            if ($sex === "Male") { setWeightForAgeStatus(11.3, 11.4, 21.4); }
            elseif ($sex === "Female") { setWeightForAgeStatus(11.0, 11.1, 21.8); }
            break;
        case 50:
            if ($sex === "Male") { setWeightForAgeStatus(11.4, 11.5, 21.7); }
            elseif ($sex === "Female") { setWeightForAgeStatus(11.1, 11.2, 22.1); }
            break;
        case 51:
            if ($sex === "Male") { setWeightForAgeStatus(11.5, 11.6, 21.9); }
            elseif ($sex === "Female") { setWeightForAgeStatus(11.2, 11.3, 22.3); }
            break;
        case 52:
            if ($sex === "Male") { setWeightForAgeStatus(11.6, 11.7, 22.1); }
            elseif ($sex === "Female") { setWeightForAgeStatus(11.3, 11.4, 22.6); }
            break;
        case 53:
            if ($sex === "Male") { setWeightForAgeStatus(11.7, 11.8, 22.4); }
            elseif ($sex === "Female") { setWeightForAgeStatus(11.4, 11.5, 22.8); }
            break;
        case 54:
            if ($sex === "Male") { setWeightForAgeStatus(11.8, 11.9, 22.6); }
            elseif ($sex === "Female") { setWeightForAgeStatus(11.5, 11.6, 23.0); }
            break;
        case 55:
            if ($sex === "Male") { setWeightForAgeStatus(11.9, 12.0, 22.9); }
            elseif ($sex === "Female") { setWeightForAgeStatus(11.6, 11.7, 23.3); }
            break;
        case 56:
            if ($sex === "Male") { setWeightForAgeStatus(12.0, 12.1, 23.1); }
            elseif ($sex === "Female") { setWeightForAgeStatus(11.7, 11.8, 23.5); }
            break;
        case 57:
            if ($sex === "Male") { setWeightForAgeStatus(12.1, 12.2, 23.4);} 
                else if ($sex === "Female") { setWeightForAgeStatus(11.8, 11.9, 24.1);}
            break;
        case 58:
            if ($sex === "Male") { 
                setWeightForAgeStatus(12.2, 12.3, 23.7); 
            } else if ($sex === "Female") { 
                setWeightForAgeStatus(11.9, 12.0, 24.4); 
            }
            break;
        case 59:
            if ($sex === "Male") { 
                setWeightForAgeStatus(12.3, 12.4, 23.9); 
            } else if ($sex === "Female") { 
                setWeightForAgeStatus(12.0, 12.1, 24.6); 
            }
            break;
        case 60:
            if ($sex === "Male") { 
                setWeightForAgeStatus(12.4, 12.5, 24.2); 
            } else if ($sex === "Female") { 
                setWeightForAgeStatus(12.1, 12.2, 24.7); 
            }
            break;
        default:
            $result = "Invalid Age";
            break;
    }

    return array("result" => $result, "statusClass" => $statusClass);
}