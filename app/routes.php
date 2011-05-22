<?php

/*
 * The routse are specified exactly like a Rails app.
 * See dynamis/core/router.php for specifics on how routes are interpreted.
 *
 * 'url/structure' => 'controller#method#params'
 *
 */

router::setRoutes( array(
  'api/:opt'              => 'wikilayer#index'
  ) );
