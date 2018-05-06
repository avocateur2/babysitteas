<?php

return array(
  'permissions' => array(
    'notice' => array(
      'own' => array(
        'create'    => 'create_own_notice_permission',
        'read'      => 'read_own_notice_permission',
        'update'    => 'update_own_notice_permission',
        'delete'    => 'delete_own_notice_permission',
        'publish'   => 'publish_own_notice_permission',
        'unpublish' => 'unpublish_own_notice_permission',
      ),
      'any' => array(
        'read'      => 'read_any_notice_permission',
        'delete'    => 'delete_any_notice_permission',
        'ban'       => 'ban_any_notice_permission',
        'unban'     => 'unban_any_notice_permission',
        'unpublish' => 'unpublish_any_notice_permission',
      ),
    ),
    'advertisement' => array(
      'own' => array(
        'create'    => 'create_own_advertisement_permission',
        'read'      => 'read_own_advertisement_permission',
        'update'    => 'update_own_advertisement_permission',
        'delete'    => 'delete_own_advertisement_permission',
        'publish'   => 'publish_own_advertisement_permission',
        'unpublish' => 'unpublish_own_advertisement_permission',
      ),
      'any' => array(
        'read'      => 'read_any_advertisement_permission',
        'delete'    => 'delete_any_advertisement_permission',
        'ban'       => 'ban_any_advertisement_permission',
        'unban'     => 'unban_any_advertisement_permission',
        'unpublish' => 'unpublish_any_advertisement_permission',
      ),
    ),
    'event' => array(
      'own' => array(
        'create'    => 'create_own_event_permission',
        'read'      => 'read_own_event_permission',
        'update'    => 'update_own_event_permission',
        'delete'    => 'delete_own_event_permission',
        'publish'   => 'publish_own_event_permission',
        'unpublish' => 'unpublish_own_event_permission',
      ),
      'any' => array(
        'read' => 'read_any_event_permission',
      ),
    ),
    'alert' => array(
      'own' => array(
        'create'    => 'create_own_alert_permission',
        'read'      => 'read_own_alert_permission',
        'update'    => 'update_own_alert_permission',
        'delete'    => 'delete_own_alert_permission',
        'publish'   => 'publish_own_alert_permission',
        'unpublish' => 'unpublish_own_alert_permission',
      ),
      'any' => array(
        'read' => 'read_any_alert_permission',
      ),
    ),
    'user' => array(
      'own' => array(
        'read'      => 'read_own_user_permission',
        'update'    => 'update_own_user_permission',
        'delete'    => 'delete_own_user_permission',
      ),
      'any' => array(
        'create'    => 'create_any_user_permission',
        'read'      => 'read_any_user_permission',
        'update'    => 'update_any_user_permission',
        'delete'    => 'delete_any_user_permission',
        'ban'       => 'ban_any_user_permission',
        'unban'     => 'unban_any_user_permission',
      ),
    ),
  ),
  'roles' => array(
    'admin'  => 'ADMIN',
    'board'  => 'BOARD',
    'owner'  => 'OWNER',
    'user'   => 'USER',
    'public' => 'PUBLIC',
  ),
);
