<?php

/**
 * Plugin Name: Custom toolkits
 * Plugin URI: 
 * Description: Toolkits Stroke Know How. Add Short code on the page. [custom_toolkit_emergency], [custom_toolkit_schedule], [custom_toolkit_exercise], [custom_toolkit_medication], [custom_toolkit_help_needed], [custom_toolkit_home]
 * Version: 1.0.0
 * Author: LN Consulting LLC
 * Author URI: 
 * License: GPL2
 */
require plugin_dir_path(__FILE__) . 'inc/toolkit-route.php';



// Register a new shortcode: [cr_custom_registration]
add_shortcode('custom_toolkit_emergency', 'custom_toolkit_shortcode_emergency');
add_shortcode('custom_toolkit_schedule', 'custom_toolkit_shortcode_schedule');
add_shortcode('custom_toolkit_exercise', 'custom_toolkit_shortcode_exercise');
add_shortcode('custom_toolkit_medication', 'custom_toolkit_shortcode_medication');
add_shortcode('custom_toolkit_help_needed', 'custom_toolkit_shortcode_help_needed');
add_shortcode('custom_toolkit_home', 'custom_toolkit_shortcode_home');

function custom_toolkit_shortcode_emergency() {
    ob_start();
    custom_toolkit_function('emergency');
    return ob_get_clean();
}

function custom_toolkit_shortcode_schedule() {
    ob_start();
    custom_toolkit_function('schedule');
    return ob_get_clean();
}

function custom_toolkit_shortcode_exercise() {
    ob_start();
    custom_toolkit_function('physical');
    return ob_get_clean();
}

function custom_toolkit_shortcode_medication() {
    ob_start();
    custom_toolkit_function('medication');
    return ob_get_clean();
}

function custom_toolkit_shortcode_help_needed() {
    ob_start();
    custom_toolkit_function('help_needed');
    return ob_get_clean();
}

function custom_toolkit_shortcode_home() {
    ob_start();
    custom_toolkit_home();
    return ob_get_clean();
}

function toolkit_emergency_form($data) {
    echo '
    <link rel="stylesheet" href="../../wp-content/plugins/custom-toolkit/custom-toolkit.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">

    
    <div class="row">
        
        <div class="container-fluid">
            <img class="w-100" src="../../wp-content/plugins/custom-toolkit/images/StrokeKnowHow_Toolkit_Emergency-B-May.jpg">
        
        </div>
        
        <div class="col-md-6">
            <!--<div style="background-color: #5994f3; color: white">ESSENTIAL INFORMATION</div>-->
            <div><img class="" style="width:100%; padding-bottom: 15px;" src="../../wp-content/plugins/custom-toolkit/images/Title-E_I.jpg"></div>
            <div class="container" style="background-color: #f7f7f4">
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="column-header-help" for="hospital1"><strong>HOSPITAL</strong></label>
                        <input type="text" class="form-control" name="hospital1" placeholder="Put Hospital..." value="' . ( isset($data['hospital1']) ? $data['hospital1'] : null ) . '">
                    </div>
                    <div class="col-6 col-md-4">
                        <label class="column-header-help" for="hospital1_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="hospital1_phone" placeholder="" value="' . ( isset($data['hospital1_phone']) ? $data['hospital1_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="column-header-help" for="doctor1"><strong>DOCTOR</strong></label>
                        <input type="text" class="form-control" name="doctor1" placeholder="Put Doctor name..." value="' . ( isset($data['doctor1']) ? $data['doctor1'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="column-header-help" for="doctor1_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="doctor1_phone" placeholder="" value="' . ( isset($data['doctor1_phone']) ? $data['doctor1_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 col-md-8">  
                        <label class="column-header-help" for="doctor2"><strong>DOCTOR</strong></label>
                        <input type="text" class="form-control" name="doctor2" placeholder="Put Doctor name..." value="' . ( isset($data['doctor2']) ? $data['doctor2'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="column-header-help" for="doctor2_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="doctor2_phone" placeholder="" value="' . ( isset($data['doctor2_phone']) ? $data['doctor2_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="column-header-help" for="dentist1"><strong>DENTIST</strong></label>
                        <input type="text" class="form-control" name="dentist1" placeholder="Put Dentist name..." value="' . ( isset($data['dentist1']) ? $data['dentist1'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="column-header-help" for="dentist1_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="dentist1_phone" placeholder="" value="' . ( isset($data['dentist1_phone']) ? $data['dentist1_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="column-header-help" for="pharmacy1"><strong>PHARMACY</strong></label>
                        <input type="text" class="form-control" name="pharmacy1" placeholder="Put Pharmacy name..." value="' . ( isset($data['pharmacy1']) ? $data['pharmacy1'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="column-header-help" for="pharmacy1_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="pharmacy1_phone" placeholder="" value="' . ( isset($data['pharmacy1_phone']) ? $data['pharmacy1_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="blue-title-light" for="insurance1"><strong>HEALTH INSURANCE PLAN</strong></label>
                        <input type="text" class="form-control" name="insurance1" placeholder="Put Health Insurance Plan..." value="' . ( isset($data['insurance1']) ? $data['insurance1'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="blue-title-light" for="insurance1_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="insurance1_phone" placeholder="" value="' . ( isset($data['insurance1_phone']) ? $data['insurance1_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="blue-title-light" for="insurance2"><strong>INSURANCE POLICY #</strong></label>
                        <input type="text" class="form-control" name="insurance2" placeholder="Put Insurance Policy #..."' . ( isset($data['insurance2']) ? $data['insurance2'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="blue-title-light" for="insurance2_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="insurance2_phone" placeholder="" value="' . ( isset($data['insurance1_phone']) ? $data['insurance2_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label class="column-header-help" for="condition1"><strong>MEDICAL CONDITIONS</strong></label>
                        <input type="text" class="form-control" name="condition1" placeholder="Put medical conditions..." value="' . ( isset($data['condition1']) ? $data['condition1'] : null ) . '">
                    </div>
                </div>
            </div>

            <!--<div style="background-color: #ea6f3f; color: white">CONTACT PHONE NUMBERS</div>-->
            <div><img class="" style="width:100%; padding: 15px 0 15px 0;" src="../../wp-content/plugins/custom-toolkit/images/Title-C_PNumber.jpg"></div>
            <div class="container" style="background-color: #f7f7f4">
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="column-header-help" for="contact1"><strong>CONTACT PERSON</strong></label>
                        <input type="text" class="form-control" name="contact1" placeholder="Put person name..." value="' . ( isset($data['contact1']) ? $data['contact1'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="column-header-help" for="contact1_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="contact1_phone" placeholder="" value="' . ( isset($data['contact1_phone']) ? $data['contact1_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="column-header-help" for="contact2"><strong>CONTACT PERSON</strong></label>
                        <input type="text" class="form-control" name="contact2" placeholder="Put person name..." value="' . ( isset($data['contact2']) ? $data['contact2'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="column-header-help" for="contact2_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="contact2_phone" placeholder="" value="' . ( isset($data['contact2_phone']) ? $data['contact2_phone'] : null ) . '">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-6 col-md-8">
                        <label class="column-header-help" for="contact3"><strong>CONTACT PERSON</strong></label>
                        <input type="text" class="form-control" name="contact3" placeholder="Put person name..." value="' . ( isset($data['contact3']) ? $data['contact3'] : null ) . '">
                    </div>
                    <div class="col">
                        <label class="column-header-help" for="contact3_phone"><strong>PHONE</strong></label>
                        <input type="text" class="form-control" name="contact3_phone" placeholder="" value="' . ( isset($data['contact3_phone']) ? $data['contact3_phone'] : null ) . '">
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <!--<div style="background-color: #518f0b; color: white">MEDICINE</div>-->
            <div><img class="" style="width:100%; padding-bottom: 15px;" src="../../wp-content/plugins/custom-toolkit/images/Title-Medicine.jpg"></div>
            <div class="container">
                ';
                for ($i = 1; $i <= 8; $i++) {
                    $bc = '#ffffff';
                    $class = 'blue-title';
                    if ($i % 2) {
                        $bc = '#f7f7f4';
                        $class = 'blue-title-light';
                    }

                    echo "
                    <div class='form-row' style='background-color: $bc'>
                        <div class='col'>   
                            <label class= '$class' for='medication$i'><strong>MEDICATION</strong></label>
                            <input type='text' class='form-control' name='medication$i' placeholder='Put your medication here...' value='" . ( isset($data["medication$i"]) ? $data["medication$i"] : null ) . "' >
                        </div>
                    </div>
                    <div class='form-row' style='background-color: $bc'>
                        <div class='col'>
                            <label class= '$class' for='medication_dosage$i'><strong>DOSAGE</strong></label>
                            <input type='text' class='form-control' name='medication_dosage$i' placeholder='Put dosage here...' value='" . ( isset($data["medication_dosage$i"]) ? $data["medication_dosage$i"] : null ) . "' >
                        </div>
                        <div class='col'>
                            <label class= '$class' for='medication_purpose$i'><strong>PURPOSE</strong></label>
                            <input type='text' class='form-control' name='medication_purpose$i' placeholder='Put purpose here...' value='" . ( isset($data["medication_purpose$i"]) ? $data["medication_purpose$i"] : null ) . "' >
                        </div>
                    </div>
                    ";
                };
        echo '
            </div>

        </div><!--row-->
        
    </div>
    
    <div class="form-group row">
        <div class="col" style="background-color: #fffbe1">
            <label for="allergies1"><strong>Allergies to medications:</strong></label>
            <input type="text"  class="form-control" class="form-control" name="allergies1" placeholder="Allergies to medications" value="' . ( isset($data['allergies1']) ? $data['allergies1'] : null ) . '">
        </div>
    </div>
    <div class="row pull-right">
        <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/Small_Logo-C-b.jpg">
    </div>
    
        <button type="submit" name="submit" class="btn btn-primary ml-4"><span class="fa fa-save mr-3"></span>Save</button>

        <a href="'; echo site_url("wp-content/uploads/2018/05/StrokeKnowHow_Toolkit_Emergency-May.pdf") .  '" target="_blank"><button type="button" name="download" class="btn btn-danger ml-4"><span class="fa fa-file-pdf-o mr-3"></span>Download</button></a>
        
    
    </form>
    '; 

}

function toolkit_schedule_form($data) {
    
    echo '
    <link rel="stylesheet" href="../../wp-content/plugins/custom-toolkit/custom-toolkit.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">

    <div class="table-responsive-lg">
        <div class="row">
            <div class="container-fluid">
                <img class="w-100 pr-4" src="../../wp-content/plugins/custom-toolkit/images/StrokeKnowHow-WeeklySchedule-B-May.jpg"> 
            
            </div>
        </div>    
        <table class="table table-bordered table-sm" style="border: 2px solid #006699; border-collapse: collapse; background-color: #f7f7f4">
            <thead>
            <tr align="center">
                <th style="width: 20px"> </th>
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Monday</span></th>
                <th class="column-header-help" style="background-color: #e6e6e6;"><span>Tuesday</span></th>            
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Wednesday</span></th>
                <th class="column-header-help" style="background-color: #e6e6e6;"><span>Thursday</span></th>            
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Friday</span></th>
                <th class="column-header-help" style="background-color: #e6e6e6;"><span>Saturday</span></th>
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Sunday</span></th>            
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="rotate" style="background: #236abe; width: 40px; height: 220px"><span class="table-label">MORNING</span></th>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='morning_monday$i' placeholder='' value='" . ( isset($data["morning_monday$i"]) ? $data["morning_monday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='morning_tuesday$i' placeholder='' value='" . ( isset($data["morning_tuesday$i"]) ? $data["morning_tuesday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='morning_wednesday$i' placeholder='' value='" . ( isset($data["morning_wednesday$i"]) ? $data["morning_wednesday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='morning_thursday$i' placeholder='' value='" . ( isset($data["morning_thursday$i"]) ? $data["morning_thursday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='morning_friday$i' placeholder='' value='" . ( isset($data["morning_friday$i"]) ? $data["morning_friday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='morning_saturday$i' placeholder='' value='" . ( isset($data["morning_saturday$i"]) ? $data["morning_saturday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='morning_sunday$i' placeholder='' value='" . ( isset($data["morning_sunday$i"]) ? $data["morning_sunday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
            </tr>
            <tr>
                <th class="rotate" style="background: #dd2f00; width: 40px; height: 220px"><span class="table-label">AFTERNOON</span></th>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='afternoon_monday$i' placeholder='' value='" . ( isset($data["afternoon_monday$i"]) ? $data["afternoon_monday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='afternoon_tuesday$i' placeholder='' value='" . ( isset($data["afternoon_tuesday$i"]) ? $data["afternoon_tuesday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='afternoon_wednesday$i' placeholder='' value='" . ( isset($data["afternoon_wednesday$i"]) ? $data["afternoon_wednesday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='afternoon_thursday$i' placeholder='' value='" . ( isset($data["afternoon_thursday$i"]) ? $data["afternoon_thursday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='afternoon_friday$i' placeholder='' value='" . ( isset($data["afternoon_friday$i"]) ? $data["afternoon_friday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='afternoon_saturday$i' placeholder='' value='" . ( isset($data["afternoon_saturday$i"]) ? $data["afternoon_saturday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='afternoon_sunday$i' placeholder='' value='" . ( isset($data["afternoon_sunday$i"]) ? $data["afternoon_sunday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
            </tr>
            <tr>
                <th class="rotate" style="background: #599d33; width: 40px; height: 220px"><span class="table-label">EVENING</span></th>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='evening_monday$i' placeholder='' value='" . ( isset($data["evening_monday$i"]) ? $data["evening_monday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='evening_tuesday$i' placeholder='' value='" . ( isset($data["evening_tuesday$i"]) ? $data["evening_tuesday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='evening_wednesday$i' placeholder='' value='" . ( isset($data["evening_wednesday$i"]) ? $data["evening_wednesday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='evening_thursday$i' placeholder='' value='" . ( isset($data["evening_thursday$i"]) ? $data["evening_thursday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='evening_friday$i' placeholder='' value='" . ( isset($data["evening_friday$i"]) ? $data["evening_friday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='evening_saturday$i' placeholder='' value='" . ( isset($data["evening_saturday$i"]) ? $data["evening_saturday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
                <td>';
                    for ($i = 1; $i <= 5; $i++) {
                       echo "
                       <input class='form-control' type='text' name='evening_sunday$i' placeholder='' value='" . ( isset($data["evening_sunday$i"]) ? $data["evening_sunday$i"] : null ) . "'>";
                    }
                    echo '
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row pull-right">
        <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/Small_Logo-C-b.jpg">
    </div>

        <button type="submit" name="submit" class="btn btn-primary ml-4"><span class="fa fa-save mr-3"></span>Save</button>

        <a href="'; echo site_url("wp-content/uploads/2018/05/StrokeKnowHow-WeeklySchedule-May.pdf") .  '" target="_blank"><button type="button" name="download" class="btn btn-danger ml-4"><span class="fa fa-file-pdf-o mr-3"></span>Download</button></a>

    
    </form>
    ';
}


function toolkit_exercise_form($data) {
    
    echo '
    <link rel="stylesheet" href="../../wp-content/plugins/custom-toolkit/custom-toolkit.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">

    <div class="table-responsive-lg">
            <div class="row">
                <div class="container">
                    <img class="w-100 pr-4" src="../../wp-content/plugins/custom-toolkit/images/StrokeKnowHow_Physical_Therapy-B-May.jpg"> 
            
                </div>
            </div>
        <table class="table table-bordered table-sm" style="border: 2px solid #006699 !important; border-collapse: collapse; background-color: #f7f7f4"">
            <thead>
            <tr align="center" >
                <th></th>
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Monday</span></th>
                <th class="column-header-help" style="background-color: #e6e6e6;"><span>Tuesday</span></th>            
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Wednesday</span></th>
                <th class="column-header-help" style="background-color: #e6e6e6;"><span>Thursday</span></th>            
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Friday</span></th>
                <th class="column-header-help" style="background-color: #e6e6e6;"><span>Saturday</span></th>
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Sunday</span></th> 
            </tr>
            </thead>
            <tr style="background-color: #e5e5dc">
                <td class="table-label-2">
                    <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/Time.jpg">
                </td>
                <td>';
                    for ($i = 1; $i <= 2; $i++) {
                       echo "
                       <input class='form-control' type='text' name='monday_time$i' value='" . ( isset($data["monday_time$i"]) ? $data["monday_time$i"] : null ) . "'>";
                    }
                    echo '
                </td>                
                <td>';
                    for ($i = 1; $i <= 2; $i++) {
                       echo "
                       <input class='form-control' type='text' name='tuesday_time$i' value='" . ( isset($data["tuesday_time$i"]) ? $data["tuesday_time$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 2; $i++) {
                       echo "
                       <input class='form-control' type='text' name='wednesday_time$i' value='" . ( isset($data["wednesday_time$i"]) ? $data["wednesday_time$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 2; $i++) {
                       echo "
                       <input class='form-control' type='text' name='thursday_time$i' value='" . ( isset($data["thursday_time$i"]) ? $data["thursday_time$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 2; $i++) {
                       echo "
                       <input class='form-control' type='text' name='friday_time$i' value='" . ( isset($data["friday_time$i"]) ? $data["friday_time$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 2; $i++) {
                       echo "
                       <input class='form-control' type='text' name='saturday_time$i' value='" . ( isset($data["saturday_time$i"]) ? $data["saturday_time$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 2; $i++) {
                       echo "
                       <input class='form-control' type='text' name='sunday_time$i' value='" . ( isset($data["sunday_time$i"]) ? $data["sunday_time$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
            </tr>
            <tr style="background-color: #f7f7f4">
                <td class="table-label-2">
                    <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/Exercise or Activity.jpg">
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="monday_exercise">' . ( isset($data['monday_exercise']) ? $data['monday_exercise'] : null ) . '</textarea>
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="tuesday_exercise">' . ( isset($data['tuesday_exercise']) ? $data['tuesday_exercise'] : null ) . '</textarea>
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="wednesday_exercise">' . ( isset($data['wednesday_exercise']) ? $data['wednesday_exercise'] : null ) . '</textarea>
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="thursday_exercise">' . ( isset($data['thursday_exercise']) ? $data['thursday_exercise'] : null ) . '</textarea>
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="friday_exercise">' . ( isset($data['friday_exercise']) ? $data['friday_exercise'] : null ) . '</textarea>
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="saturday_exercise">' . ( isset($data['saturday_exercise']) ? $data['saturday_exercise'] : null ) . '</textarea>
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="sunday_exercise">' . ( isset($data['sunday_exercise']) ? $data['sunday_exercise'] : null ) . '</textarea>
                </td>
            </tr>
            <tr style="background-color: #e5e5dc">
                <td class="table-label-2">
                    <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/Pulse.jpg">
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="monday_pulse_during">' . ( isset($data['monday_pulse_during']) ? $data['monday_pulse_during'] : null ) . '</textarea>
                    
                    <textarea class="form-control" rows="3" name="monday_pulse_after">' . ( isset($data['monday_pulse_after']) ? $data['monday_pulse_after'] : null ) . '</textarea>                    
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="tuesday_pulse_during">' . ( isset($data['tuesday_pulse_during']) ? $data['tuesday_pulse_during'] : null ) . '</textarea>
                    
                    <textarea class="form-control" rows="3" name="tuesday_pulse_after">' . ( isset($data['tuesday_pulse_after']) ? $data['tuesday_pulse_after'] : null ) . '</textarea>                    
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="wednesday_pulse_during">' . ( isset($data['wednesday_pulse_during']) ? $data['wednesday_pulse_during'] : null ) . '</textarea>
                    <textarea class="form-control" rows="3" name="wednesday_pulse_after">' . ( isset($data['wednesday_pulse_after']) ? $data['wednesday_pulse_after'] : null ) . '</textarea>                    
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="thursday_pulse_during">' . ( isset($data['thursday_pulse_during']) ? $data['thursday_pulse_during'] : null ) . '</textarea>
                    <textarea class="form-control" rows="3" name="thursday_pulse_after">' . ( isset($data['thursday_pulse_after']) ? $data['thursday_pulse_after'] : null ) . '</textarea>                    
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="friday_pulse_during">' . ( isset($data['friday_pulse_during']) ? $data['friday_pulse_during'] : null ) . '</textarea>
                    <textarea class="form-control" rows="3" name="friday_pulse_after">' . ( isset($data['friday_pulse_after']) ? $data['friday_pulse_after'] : null ) . '</textarea>                    
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="saturday_pulse_during">' . ( isset($data['saturday_pulse_during']) ? $data['saturday_pulse_during'] : null ) . '</textarea>
                    <textarea class="form-control" rows="3" name="saturday_pulse_after">' . ( isset($data['saturday_pulse_after']) ? $data['saturday_pulse_after'] : null ) . '</textarea>                    
                </td>
                <td>
                    <textarea class="form-control" rows="3" name="sunday_pulse_during">' . ( isset($data['sunday_pulse_during']) ? $data['sunday_pulse_during'] : null ) . '</textarea>
                    <textarea class="form-control" rows="3" name="sunday_pulse_after">' . ( isset($data['sunday_pulse_after']) ? $data['sunday_pulse_after'] : null ) . '</textarea>                    
                </td>
            </tr>
           <tr style="background-color: #e5e5dc">
                <td class="table-label-2">
                    <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/PersonalGoals.png">
                </td>
                <td>';
                    for ($i = 1; $i <= 3; $i++) {
                       echo "
                       <input class='form-control' type='text' name='monday_goals$i' value='" . ( isset($data["monday_goals$i"]) ? $data["monday_goals$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 3; $i++) {
                       echo "
                       <input class='form-control' type='text' name='tuesday_goals$i' value='" . ( isset($data["tuesday_goals$i"]) ? $data["tuesday_goals$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 3; $i++) {
                       echo "
                       <input class='form-control' type='text' name='wednesday_goals$i' value='" . ( isset($data["wednesday_goals$i"]) ? $data["wednesday_goals$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 3; $i++) {
                       echo "
                       <input class='form-control' type='text' name='thursday_goals$i' value='" . ( isset($data["thursday_goals$i"]) ? $data["thursday_goals$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 3; $i++) {
                       echo "
                       <input class='form-control' type='text' name='friday_goals$i' value='" . ( isset($data["friday_goals$i"]) ? $data["friday_goals$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 3; $i++) {
                       echo "
                       <input class='form-control' type='text' name='saturday_goals$i' value='" . ( isset($data["saturday_goals$i"]) ? $data["saturday_goals$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
                <td>';
                    for ($i = 1; $i <= 3; $i++) {
                       echo "
                       <input class='form-control' type='text' name='sunday_goals$i' value='" . ( isset($data["sunday_goals$i"]) ? $data["sunday_goals$i"] : null ) . "'>";
                    }
                    echo '
                </td>               
            </tr>
        </table>
    </div>
    <div class="row pull-right">
        <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/Small_Logo-C-b.jpg">
    </div>

        <button type="submit" name="submit" class="btn btn-primary ml-4"><span class="fa fa-save mr-3"></span>Save</button>

        <a href="'; echo site_url("wp-content/uploads/2018/05/StrokeKnowHow-Physical-Therapy-May.pdf") .  '" target="_blank"><button type="button" name="download" class="btn btn-danger ml-4"><span class="fa fa-file-pdf-o mr-3"></span>Download</button></a>

    
    </form>
    ';
}

function toolkit_medication_form($data) {

    echo '
    <link rel="stylesheet" href="../../wp-content/plugins/custom-toolkit/custom-toolkit.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">

        
          
        <div class="container-fluid">
            <div class="row">
              <img class="w-100 pr-4" src="../../wp-content/plugins/custom-toolkit/images/MedicationToolkit-B-May.jpg"> 
              
            </div>
        </div>

        <div class="table-responsive-lg">  
          <table class="table table-striped table-bordered table-sm" style="border: 2px solid #006699; border-collapse: collapse; background-color: AliceBlue">
            <thead>
              <tr align="center">
                <th style="background-color: red; width: 30px;"></th>
                <th style="background-color: red;"><span style="color: white;">Medicine/Dose</span></th>
                <th style="background-color: LightSkyBlue; color:DarkBlue;">morning</th>
                <th style="background-color: LightSkyBlue; color:DarkBlue;">noon</th>
                <th style="background-color: LightSkyBlue; color:DarkBlue;">afternoon</th>
                <th style="background-color: LightSkyBlue; color:DarkBlue;">evening</th>
                <th style="background-color: LightSkyBlue; color:DarkBlue;">bedtime</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th class="rotate" style="background-color: LightSkyBlue; width: 40px; height: 185px; color:DarkBlue;"><span>MONDAY</span></th>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='medicineMonday$i' placeholder='Put your medicine...' value='" . ( isset($data["medicineMonday$i"]) ? $data["medicineMonday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='morningMonday$i' value='" . ( isset($data["morningMonday$i"]) ? $data["morningMonday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='noonMonday$i' value='" . ( isset($data["noonMonday$i"]) ? $data["noonMonday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='afternoonMonday$i' value='" . ( isset($data["afternoonMonday$i"]) ? $data["afternoonMonday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='eveningMonday$i' value='" . ( isset($data["eveningMonday$i"]) ? $data["eveningMonday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='bedtimeMonday$i' value='" . ( isset($data["bedtimeMonday$i"]) ? $data["bedtimeMonday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
              </tr>
              <tr>
                <th class="rotate" style="background-color: LightSkyBlue; width: 40px; height: 185px; color:DarkBlue;"><span>TUESDAY</span></th>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='medicineTuesday$i' placeholder='Put your medicine...' value='" . ( isset($data["medicineTuesday$i"]) ? $data["medicineTuesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='morningTuesday$i' value='" . ( isset($data["morningTuesday$i"]) ? $data["morningTuesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='noonTuesday$i' value='" . ( isset($data["noonTuesday$i"]) ? $data["noonTuesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='afternoonTuesday$i' value='" . ( isset($data["afternoonTuesday$i"]) ? $data["afternoonTuesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='eveningTuesday$i' value='" . ( isset($data["eveningTuesday$i"]) ? $data["eveningTuesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='bedtimeTuesday$i' value='" . ( isset($data["bedtimeTuesday$i"]) ? $data["bedtimeTuesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
              </tr>
              <tr>
                <th class="rotate" style="background-color: LightSkyBlue; width: 40px; height: 185px; color:darkBlue;"><span>WEDNESDAY</span></th>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='medicineWednesday$i' placeholder='Put your medicine...' value='" . ( isset($data["medicineWednesday$i"]) ? $data["medicineWednesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='morningWednesday$i' value='" . ( isset($data["morningWednesday$i"]) ? $data["morningWednesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='noonWednesday$i' value='" . ( isset($data["noonWednesday$i"]) ? $data["noonWednesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='afternoonWednesday$i' value='" . ( isset($data["afternoonWednesday$i"]) ? $data["afternoonWednesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='eveningWednesday$i' value='" . ( isset($data["eveningWednesday$i"]) ? $data["eveningWednesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='bedtimeWednesday$i' value='" . ( isset($data["bedtimeWednesday$i"]) ? $data["bedtimeWednesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
              </tr>
              <tr>
                <th class="rotate" style="background-color: LightSkyBlue; width: 40px; height: 185px; color:darkBlue;"><span>THURSDAY</span></th>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='medicineThursday$i' placeholder='Put your medicine...' value='" . ( isset($data["medicineThursday$i"]) ? $data["medicineThursday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='morningThursday$i' value='" . ( isset($data["morningThursday$i"]) ? $data["morningThursday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='noonThursday$i' value='" . ( isset($data["noonThursday$i"]) ? $data["noonThursday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='afternoonThursday$i' value='" . ( isset($data["afternoonThursday$i"]) ? $data["afternoonThursday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='eveningThursday$i' value='" . ( isset($data["eveningThursday$i"]) ? $data["eveningThursday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='bedtimeThursday$i' value='" . ( isset($data["bedtimeThursday$i"]) ? $data["bedtimeThursday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
              </tr>
              <tr>
                <th class="rotate" style="background-color: LightSkyBlue; width: 40px; height: 185px; color:darkBlue;"><span>FRIDAY</span></th>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='medicineFriday$i' placeholder='Put your medicine...' value='" . ( isset($data["medicineFriday$i"]) ? $data["medicineFriday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='morningFriday$i' value='" . ( isset($data["morningFriday$i"]) ? $data["morningFriday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='noonFriday$i' value='" . ( isset($data["noonFriday$i"]) ? $data["noonFriday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='afternoonFriday$i' value='" . ( isset($data["afternoonFriday$i"]) ? $data["afternoonFriday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='eveningFriday$i' value='" . ( isset($data["eveningFriday$i"]) ? $data["eveningFriday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='bedtimeFriday$i' value='" . ( isset($data["bedtimeFriday$i"]) ? $data["bedtimeFriday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
              </tr>
              <tr>
                <th class="rotate" style="background-color: LightSkyBlue; width: 40px; height: 185px; color:darkBlue;"><span>SATURDAY</span></th>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='medicineSaturday$i' placeholder='Put your medicine...' value='" . ( isset($data["medicineSaturday$i"]) ? $data["medicineSaturday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='morningSaturday$i' value='" . ( isset($data["morningSaturday$i"]) ? $data["morningSaturday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='noonSaturday$i' value='" . ( isset($data["noonSaturday$i"]) ? $data["noonSaturday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='afternoonSaturday$i' value='" . ( isset($data["afternoonSaturday$i"]) ? $data["afternoonSaturday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='eveningSaturday$i' value='" . ( isset($data["eveningSaturday$i"]) ? $data["eveningSaturday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='bedtimeSaturday$i' value='" . ( isset($data["bedtimeSaturday$i"]) ? $data["bedtimeSaturday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
              </tr>                            
              <tr>
                <th class="rotate" style="background-color: LightSkyBlue; width: 40px; height: 185px; color:darkBlue;"><span>SUNDAY</span></th>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='medicineSunday$i' placeholder='Put your medicine...' value='" . ( isset($data["medicineSunday$i"]) ? $data["medicineSunday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='morningSunday$i' value='" . ( isset($data["morningSunday$i"]) ? $data["morningSunday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='noonSunday$i' value='" . ( isset($data["noonSunday$i"]) ? $data["noonSunday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='afternoonSunday$i' value='" . ( isset($data["afternoonSunday$i"]) ? $data["afternoonSunday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='eveningSunday$i' value='" . ( isset($data["eveningSunday$i"]) ? $data["eveningSunday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 5; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='bedtimeSunday$i' value='" . ( isset($data["bedtimeSunday$i"]) ? $data["bedtimeSunday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
              </tr>              
            </tbody>
          </table>
        </div>
        <div class="row pull-right">
            <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/Small_Logo-C-b.jpg">
        </div>

        <button type="submit" name="submit" class="btn btn-primary ml-4"><span class="fa fa-save mr-3"></span>Save</button>

        <a href="'; echo site_url("wp-content/uploads/2018/05/MedicationToolkit-May-orange2.pdf") .  '" target="_blank"><button type="button" name="download" class="btn btn-danger ml-4"><span class="fa fa-file-pdf-o mr-3"></span>Download</button></a>
        
        </form>
    ';
}


function toolkit_help_needed_form($data) {

    echo '
    <link rel="stylesheet" href="../../wp-content/plugins/custom-toolkit/custom-toolkit.css" type="text/css" />
    
        <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">

        <div class="table-responsive-lg">  
          <div class="row">
            <div class="container">
              <img class="w-100 pr-4" src="../../wp-content/plugins/custom-toolkit/images/StrokeKnowHow_Help_Needed_Toolkit-B-May.jpg"> 
              
            </div>
          </div>          
          <table class="table table-bordered table-sm" style="border: 2px solid #006699; border-collapse: collapse; background-color: #f7f7f4">
            <thead>
              <tr align="center">
                <th></th>
                <th class="column-header-help" style="background-color: #f2f2f2;"><span>Monday</span></th>
                <th class="column-header-help" style="background-color: #e6e6e6;">Tuesday</th>
                <th class="column-header-help" style="background-color: #f2f2f2;">Wednesday</th>
                <th class="column-header-help" style="background-color: #e6e6e6;">Thursday</th>
                <th class="column-header-help" style="background-color: #f2f2f2;">Friday</th>
                <th class="column-header-help" style="background-color: #e6e6e6;">Saturday</th>
                <th class="column-header-help" style="background-color: #f2f2f2;">Sunday</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td colspan=8 class="headline--small-plus" style="background-color: #bf4080; color: white; text-align: center;">
                   PERSONAL CARE
                </td>
              </tr>
              <tr>
                    <td><div class="row-header">Nursing Care</div>
                        <div class="row-header">Medications</div>
                        <div class="row-header">Physical Therapy</div>
                    </td>
                    <td>';
                        for ($i = 1; $i <= 2; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='personal-care-monday$i' placeholder='' value='" . ( isset($data["personal-care-monday$i"]) ? $data["personal-care-monday$i"] : null ) . "'>";
                        }
                        echo '
                        <textarea class="form-control form-control-sm"  style="padding-top: 0px;" name="physical-therapy-monday" rows="3">'. (isset($data["physical-therapy-monday"]) ? $data["physical-therapy-monday"] : null)  .'</textarea>
                    </td>
                     <td>';
                        for ($i = 1; $i <= 2; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='personal-care-tuesday$i' value='" . ( isset($data["personal-care-tuesday$i"]) ? $data["personal-care-tuesday$i"] : null ) . "'>";
                        }
                        echo '
                        <textarea class="form-control form-control-sm"  style="padding-top: 0px;" name="physical-therapy-tuesday" rows="3">'. (isset($data["physical-therapy-tuesday"]) ? $data["physical-therapy-tuesday"] : null)  .'</textarea>                        
                    </td>
                    <td>';
                        for ($i = 1; $i <= 2; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='personal-care-wednesday$i' value='" . ( isset($data["personal-care-wednesday$i"]) ? $data["personal-care-wednesday$i"] : null ) . "'>";
                        }
                        echo '
                        <textarea class="form-control form-control-sm"  style="padding-top: 0px;" name="physical-therapy-wednesday" rows="3">'. (isset($data["physical-therapy-wednesday"]) ? $data["physical-therapy-wednesday"] : null)  .'</textarea>                        
                    </td>
                     <td>';
                        for ($i = 1; $i <= 2; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='personal-care-thursday$i' value='" . ( isset($data["personal-care-thursday$i"]) ? $data["personal-care-thursday$i"] : null ) . "'>";
                        }
                        echo '
                        <textarea class="form-control form-control-sm"  style="padding-top: 0px;" name="physical-therapy-thursday" rows="3">'. (isset($data["physical-therapy-thursday"]) ? $data["physical-therapy-thursday"] : null)  .'</textarea>                        
                    </td>
                    <td>';
                        for ($i = 1; $i <= 2; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='personal-care-friday$i' value='" . ( isset($data["personal-care-friday$i"]) ? $data["personal-care-friday$i"] : null ) . "'>";
                        }
                        echo '
                        <textarea class="form-control form-control-sm"  style="padding-top: 0px;" name="physical-therapy-friday" rows="3">'. (isset($data["physical-therapy-friday"]) ? $data["physical-therapy-friday"] : null)  .'</textarea>                        
                    </td>
                     <td>';
                        for ($i = 1; $i <= 2; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='personal-care-saturday$i' value='" . ( isset($data["personal-care-saturday$i"]) ? $data["personal-care-saturday$i"] : null ) . "'>";
                        }
                        echo '
                        <textarea class="form-control form-control-sm"  style="padding-top: 0px;" name="physical-therapy-saturday" rows="3">'. (isset($data["physical-therapy-saturday"]) ? $data["physical-therapy-saturday"] : null)  .'</textarea>                        
                    </td>
                     <td>';
                        for ($i = 1; $i <= 2; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='personal-care-sunday$i' value='" . ( isset($data["personal-care-sunday$i"]) ? $data["personal-care-sunday$i"] : null ) . "'>";
                        }
                        echo '
                        <textarea class="form-control form-control-sm"  style="padding-top: 0px;" name="physical-therapy-sunday" rows="3">'. (isset($data["physical-therapy-sunday"]) ? $data["physical-therapy-sunday"] : null)  .'</textarea>                        
                    </td>
              </tr>
              <tr>
                <td colspan=8 class="headline--small-plus" style="background-color: #0052cc; color: white; text-align: center;">HOUSEHOLD
                </td>
              </tr>              
              <tr>
                    <td>
                        <div class="row-header">Shopping</div>
                        <div class="row-header">Cooking</div>
                        <div class="row-header">Housekeeping</div>
                        <div class="row-header">Laundry</div>
                    </td>
                    <td>';
                        for ($i = 1; $i <= 4; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='household-monday$i' placeholder='' value='" . ( isset($data["household-monday$i"]) ? $data["household-monday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 4; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='household-tuesday$i' value='" . ( isset($data["household-tuesday$i"]) ? $data["household-tuesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 4; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='household-wednesday$i' value='" . ( isset($data["household-wednesday$i"]) ? $data["household-wednesday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 4; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='household-thursday$i' value='" . ( isset($data["household-thursday$i"]) ? $data["household-thursday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                    <td>';
                        for ($i = 1; $i <= 4; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='household-friday$i' value='" . ( isset($data["household-friday$i"]) ? $data["household-friday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 4; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='household-saturday$i' value='" . ( isset($data["household-saturday$i"]) ? $data["household-saturday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>
                     <td>';
                        for ($i = 1; $i <= 4; $i++) {
                           echo "
                           <input class='form-control form-control-sm' type='text' name='household-sunday$i' value='" . ( isset($data["household-sunday$i"]) ? $data["household-sunday$i"] : null ) . "'>";
                        }
                        echo '
                    </td>                    
              </tr>
              <tr>
                <td colspan=8 class="headline--small-plus" style="background-color: #2eb82e; color: white; text-align: center;">SCHEDULE 
                </td>
              </tr>                            
              <tr>
                <td>
                        <div class="row-header-help">Doctor visits</div>
                        <div class="row-header-help">Therapist visits</div>
                </td>
                    <td>
                        <textarea class="form-control form-control-sm" name="schedule-monday1" rows="2">'. (isset($data["schedule-monday1"]) ? $data["schedule-monday1"] : null)  .'</textarea>
                        <textarea class="form-control form-control-sm" name="schedule-monday2" rows="2">'. (isset($data["schedule-monday2"]) ? $data["schedule-monday2"] : null)  .'</textarea>                                                                       
                    </td>
                     <td>
                        <textarea class="form-control form-control-sm" name="schedule-tuesday1" rows="2">'. (isset($data["schedule-tuesday1"]) ? $data["schedule-tuesday1"] : null)  .'</textarea>
                        <textarea class="form-control form-control-sm" name="schedule-tuesday2" rows="2">'. (isset($data["schedule-tuesday2"]) ? $data["schedule-tuesday2"] : null)  .'</textarea>                                                                        
                    </td>
                    <td>                        
                        <textarea class="form-control form-control-sm" name="schedule-wednesday1" rows="2">'. (isset($data["schedule-wednesday1"]) ? $data["schedule-wednesday1"] : null)  .'</textarea>
                        <textarea class="form-control form-control-sm" name="schedule-wednesday2" rows="2">'. (isset($data["schedule-wednesday2"]) ? $data["schedule-wednesday2"] : null)  .'</textarea>                                                                     
                    </td>
                     <td> 
                        <textarea class="form-control form-control-sm" name="schedule-thursday1" rows="2">'. (isset($data["schedule-thursday1"]) ? $data["schedule-thursday1"] : null)  .'</textarea>
                        <textarea class="form-control form-control-sm" name="schedule-thursday2" rows="2">'. (isset($data["schedule-thursday2"]) ? $data["schedule-thursday2"] : null)  .'</textarea>                                                                     
                    </td>
                    <td>
                        <textarea class="form-control form-control-sm" name="schedule-friday1" rows="2">'. (isset($data["schedule-friday1"]) ? $data["schedule-friday1"] : null)  .'</textarea>
                        <textarea class="form-control form-control-sm" name="schedule-friday2" rows="2">'. (isset($data["schedule-friday2"]) ? $data["schedule-friday2"] : null)  .'</textarea>                                                                     
                    </td>
                     <td>  
                        <textarea class="form-control form-control-sm" name="schedule-saturday1" rows="2">'. (isset($data["schedule-saturday1"]) ? $data["schedule-saturday1"] : null)  .'</textarea>
                        <textarea class="form-control form-control-sm" name="schedule-saturday2" rows="2">'. (isset($data["schedule-saturday2"]) ? $data["schedule-saturday2"] : null)  .'</textarea>                                                                     
                    </td>
                     <td>
                        <textarea class="form-control form-control-sm" name="schedule-sunday1" rows="2">'. (isset($data["schedule-sunday1"]) ? $data["schedule-sunday1"] : null)  .'</textarea>
                        <textarea class="form-control form-control-sm" name="schedule-sunday2" rows="2">'. (isset($data["schedule-sunday2"]) ? $data["schedule-sunday2"] : null)  .'</textarea>                                                                     
                    </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row pull-right">
            <img class="img-fluid" src="../../wp-content/plugins/custom-toolkit/images/Small_Logo-C-b.jpg">
        </div>

        <button type="submit" name="submit" class="btn btn-primary ml-4"><span class="fa fa-save mr-3"></span>Save</button>

        <a href="'; echo site_url("wp-content/uploads/2018/05/StrokeKnowHow-Help-Needed-Toolkit-May.pdf") .  '" target="_blank"><button type="button" name="download" class="btn btn-danger ml-4"><span class="fa fa-file-pdf-o mr-3"></span>Download</button></a>

        
        </form>
    ';
}

function custom_toolkit_home() {
    $current_user = wp_get_current_user();

    echo '
        <link rel="stylesheet" href="../wp-content/plugins/custom-toolkit/custom-toolkit.css" type="text/css" />
      
        <div class="container">
            <div class="row">
                <div class="container-fluid text-center">
                    <img class="img-fluid" src="../wp-content/plugins/custom-toolkit/images/SKH_Logo-1b.jpg"> 
                    <h1 class="headline--small blue-title">Welcome '; echo $current_user->user_nicename; echo '!!. Here are your free toolkits</h1>
                    <h1 class="headline--medium blue-title text-center">Free Toolkits</h1>
                </div>   
            </div>

            <div class="row">

                <div class="col-md-6 zoom">
                   <a href=';
                   echo esc_url(site_url("/toolkit-medication"));
                   echo '><img id="image" class="img-thumbnail mx-auto d-block" src="../wp-content/plugins/custom-toolkit/images/Medication-may.jpg"></a> 
                </div>

                <div class="col-md-6 zoom">
                   <a href=';
                   echo esc_url(site_url("/toolkit-emergency"));
                   echo '><img class="img-thumbnail img-fluid mx-auto d-block" src="../wp-content/plugins/custom-toolkit/images/EmergencyInfoSt-may.jpg"></a>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 zoom">
                   <a href=';
                   echo esc_url(site_url("/toolkit-weekly-schedule"));
                   echo '><img class="img-thumbnail img-fluid mx-auto d-block" src="../wp-content/plugins/custom-toolkit/images/WeeklySchedule.jpg"></a>
                </div>

                <div class="col-md-6 zoom">
                   <a href=';
                   echo esc_url(site_url("/toolkit-physical-therapy"));               
                   echo '><img class="img-thumbnail img-fluid mx-auto d-block" src="../wp-content/plugins/custom-toolkit/images/Physical Therapy-May.jpg"></a>
                </div>                
            </div>

            <div class="row">
                <div class="col-md-6 zoom">
                   <a href=';
                   echo esc_url(site_url("/toolkit-help-needed"));               
                   echo '><img class="img-thumbnail img-fluid mx-auto d-block" src="../wp-content/plugins/custom-toolkit/images/HelpNeeded-M.jpg"></a>
                </div>
            </div>

        </div>



    ';

}


function validation() {
    global $reg_errors;
    $reg_errors = new WP_Error;

    if (TRUE) {
        $reg_errors->add('field', 'Required form field is missing');
    }

    if (is_wp_error($reg_errors)) {
        foreach ($reg_errors->get_error_messages() as $error) {
            echo '<div>';
            echo '<strong>ERROR</strong>:';
            echo $error . '<br/>';
            echo '</div>';
        }
    }
}

function custom_toolkit_function($type) {
    global $wpdb;
    $current_user = wp_get_current_user();

     
    $row = new WP_Query(array(
        'post_type' => $type,
        'post_per_page' => -1,
        'author' => get_current_user_id()
    ));
    

    if (isset($_POST['submit'])) {

        //Limpiar las varibles recibidas
        foreach ($_POST as $key => $value) {
            $_POST[$key] = sanitize_text_field($value);
        }

        if ($row->found_posts) {

              update_post_meta( $row->post->ID, 'json_field', json_encode($_POST) );

        } else {

                /*$request = WP_REST_Request::from_url( 'http://localhost/strokeknowhow2/wp-json/toolkit/v1/emergency' );
                
                $request->set_method( 'POST' );
                $response = rest_do_request( $request );*/
                
              wp_insert_post(array(
                'post_type' => $type,
                'post_status' => 'publish',
                'meta_input' => array(
                    'json_field' => json_encode($_POST)
                )
              ));

                $row = new WP_Query(array(
                    'post_type' => $type,
                    'post_per_page' => -1,
                    'author' => get_current_user_id()
                ));

        }

    } 
    
   while ($row->have_posts()) {
        $row->the_post();
        $data = json_decode(get_field('json_field'), true);
   }

    
    switch ($type) {
        case 'emergency':
            toolkit_emergency_form($data);
            break;
        case 'schedule':
            toolkit_schedule_form($data);
            break;
        case 'physical':
            toolkit_exercise_form($data);
            break;
        case 'medication':
            toolkit_medication_form($data);
            break;
        case 'help_needed':
            toolkit_help_needed_form($data);
            break;    
    }


}
