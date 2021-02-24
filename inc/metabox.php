<?php

 add_filter('rwmb_meta_boxes', 'al_anon_register_meta_boxes');
 function al_anon_register_meta_boxes($meta_boxes) {
  // META BOX
  $meta_boxes[] = array(
    'id'         => 'meeting_settings',
    'title'      => __('Meeting Settings', 'al_anon'),
    'context'    => 'after_title',
    'priority'   => 'high',
    'post_types' => array( 'meetings' ),
    'autosave'   => true,
    'fields'     => array(
      // IN PERSON?
      array(
        'name' => 'In Person Meeting?',
        'id'   => 'meeting_in_person',
        'type' => 'checkbox',
        'std'  => 1,
      ),
      // DAY OF THE WEEK
      array(
        'name'            => 'Day',
        'id'              => 'meeting_day',
        'type'            => 'select',
        'options'         => array(
          'sunday'        => 'Sunday',
          'monday'        => 'Monday',
          'tuesday'       => 'Tuesday',
          'wednesday'     => 'Wednesday',
          'thursday'      => 'Thursday',
          'friday'        => 'Friday',
          'saturday'      => 'Saturday',
        ),
        'multiple'        => false,
        'placeholder'     => 'Select a Day',
      ),
      // START TIME
      array(
        'name'       => 'Start Time',
        'id'         => 'meeting_start_time',
        'type'       => 'time',
        'js_options' => array(
            'timeFormat'      =>'h:mm TT',
            'stepMinute'      => 30,
            'controlType'     => 'select',
            'showButtonPanel' => true,
            'oneLine'         => true,
        ),
        'inline'     => false,
      ),
      // END TIME
      array(
        'name'       => 'End Time',
        'id'         => 'meeting_end_time',
        'type'       => 'time',
        'js_options' => array(
            'timeFormat'      =>'h:mm TT',
            'stepMinute'      => 30,
            'controlType'     => 'select',
            'showButtonPanel' => true,
            'oneLine'         => true,
        ),
        'inline'     => false,
      ),
      // LOCATION
      array(
        'name'        => 'Location',
        'id'          => 'meeting_location',
        'type'        => 'textarea',
        'rows'        => 1,
      ),
      // ADDRESS
      array(
        'name'        => 'Address',
        'id'          => 'meeting_address',
        'type'        => 'textarea',
        'rows'        => 1,
      ),
      array(
        'type' => 'divider',
      ),
      // HOST/CONTACT
      array(
        'name'        => 'Host/Contact',
        'id'          => 'meeting_host',
        'type'        => 'text',
        'placeholder' => 'Jane Smith',
        'size'        => 30,
      ),
      // PHONE
      array(
        'name'        => 'Host/Contact Phone Number',
        'id'          => 'meeting_host_phone',
        'type'        => 'text',
        'placeholder' => '801-123-4567',
        'size'        => 30,
      ),
      // EMAIL
      array(
        'name'        => 'Host/Contact Email',
        'id'          => 'meeting_host_email',
        'type'        => 'text',
        'placeholder' => 'j.smith@gmail.com',
        'size'        => 30,
      ),
      array(
        'type' => 'divider',
      ),
      // ZOOM ID
      array(
        'name'        => 'ZOOM ID',
        'id'          => 'meeting_zoom_id',
        'type'        => 'text',
        'placeholder' => '123 456 7890',
        'size'        => 30,
      ),
      // ZOOM PASS
      array(
        'name'        => 'ZOOM Password',
        'id'          => 'meeting_zoom_pass',
        'type'        => 'text',
        'placeholder' => 'AAPASS2021',
        'size'        => 30,
      ),
      array(
        'type' => 'divider',
      ),
      // SHORT DESCRIPTION
      array(
        'name'        => 'Short Description',
        'id'          => 'meeting_short_desc',
        'type'        => 'textarea',
      ),
      // ALERT NOTICE
      array(
        'name'        => 'Alert Notice',
        'id'          => 'meeting_notice',
        'type'        => 'textarea',
      ),
    )
  );
  // END META BOX
  return $meta_boxes;
};



?>